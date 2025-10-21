<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        $countries = [
            ['country_code' => '+91', 'name' => 'India'],
            ['country_code' => '+1', 'name' => 'USA'],
            ['country_code' => '+44', 'name' => 'UK'],
            ['country_code' => '+971', 'name' => 'UAE'],
        ];
        return view('auth.login', compact('countries'));
    }

    /**
     * ✅ Common function for both Login & Register OTP send
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'type' => 'required|in:login,register',
        ]);

        $otp = rand(100000, 999999);

        $user = User::where('email', $request->email)->first();

        // REGISTER FLOW
        if ($request->type === 'register') {
            if ($user) {
                return response()->json(['status' => false, 'message' => 'This email is already registered. Please login.']);
            }

            // temporarily hold OTP without creating user
            cache()->put('register_otp_' . $request->email, [
                'otp' => $otp,
                'expires_at' => now()->addMinutes(5)
            ], 300);

            $subject = 'Your Registration OTP';
            $message = "Your OTP for registration is: {$otp}";
        }
        // LOGIN FLOW
        else {
            if (!$user) {
                return response()->json(['status' => false, 'message' => 'User not found. Please register first.']);
            }

            $user->update([
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(5),
            ]);

            $subject = 'Your Login OTP';
            $message = "Your OTP for login is: {$otp}";
        }

        // Send OTP mail
        Mail::raw($message, function ($m) use ($request, $subject) {
            $m->from(config('mail.from.address'), config('mail.from.name'))
                ->to($request->email)
                ->subject($subject);
        });

        return response()->json(['status' => true, 'message' => 'OTP sent successfully to your email.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required',
            'type' => 'required|in:login,register',
        ]);

        // REGISTER FLOW
        if ($request->type === 'register') {
            $cachedOtp = cache()->get('register_otp_' . $request->email);

            if (!$cachedOtp) {
                return response()->json(['status' => false, 'message' => 'OTP expired or not found.']);
            }

            if ($cachedOtp['otp'] != $request->otp) {
                return response()->json(['status' => false, 'message' => 'Invalid OTP.']);
            }

            if (now()->gt($cachedOtp['expires_at'])) {
                return response()->json(['status' => false, 'message' => 'OTP expired.']);
            }

            // Create the new user now (only after OTP verified)
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2,
            ]);

            Auth::login($user);
            cache()->forget('register_otp_' . $request->email);

            return response()->json([
                'status' => true,
                'redirect' => route('dashboard'),
                'message' => '🎉 Registration successful! Welcome aboard.'
            ]);
        }

        // LOGIN FLOW
        else {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['status' => false, 'message' => 'User not found.']);
            }

            if ($user->otp !== $request->otp) {
                return response()->json(['status' => false, 'message' => 'Invalid OTP.']);
            }

            if (now()->gt($user->otp_expires_at)) {
                return response()->json(['status' => false, 'message' => 'OTP expired. Please resend.']);
            }

            $user->update(['otp' => null, 'otp_expires_at' => null]);

            Auth::login($user);

            return response()->json([
                'status' => true,
                'redirect' => route('dashboard'),
                'message' => '✅ Login successful! Welcome back.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.register')->with('success', '👋 You have logged out successfully.');
    }
}
