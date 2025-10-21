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

    public function sendOtp(Request $request)
    {
        $type = $request->type;

        $rules = ['email' => 'required|email'];

        if ($type === 'register') {
            $rules['name'] = 'required|string|max:255';
            $rules['password'] = 'required|min:6';
        } elseif ($type === 'login') {
            $rules['mobile'] = 'required';
            $rules['country_code'] = 'required';
        }

        $request->validate($rules);

        $user = User::where('email', $request->email)->first();

        if ($type === 'register' && $user) {
            return response()->json(['status' => false, 'message' => 'User already registered.']);
        }

        if ($type === 'login' && !$user) {
            return response()->json(['status' => false, 'message' => 'User not found. Please register first.']);
        }

        $otp = rand(100000, 999999);
        $user = User::updateOrCreate(
            ['email' => $request->email],
            [
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(5),
                'name' => $user->name ?? $request->name ?? null,
                'password' => $user->password ?? Hash::make($request->password ?? 'temp'),
            ]
        );

        Mail::raw("Your OTP is: {$otp}", function ($message) use ($user, $type) {
            $message->from('no-reply@yourapp.com', 'Your App Name');
            $message->to($user->email)
                ->subject("Your " . ucfirst($type) . " OTP");
        });

        return response()->json(['status' => true, 'message' => 'OTP sent successfully!']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found.']);
        }

        if ($user->otp !== $request->otp || now()->gt($user->otp_expires_at)) {
            return response()->json(['status' => false, 'message' => 'Invalid or expired OTP.']);
        }

        if ($request->type === 'register') {
            $user->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => 2,
                'otp' => null,
                'otp_expires_at' => null,
            ]);
        } else {
            $user->update(['otp' => null, 'otp_expires_at' => null]);
        }

        Auth::login($user);

        if ($request->type === 'register') {

            return response()->json([
                'status' => true,
                'redirect' => route('dashboard'),
                'message' => ucfirst($request->type) . ' successful! Welcome ' . $user->name
            ]);
        } else {
            return response()->json([
                'status' => true,
                'redirect' => route('complaint-form'),
                'message' => ucfirst($request->type) . ' successful! Welcome ' . $user->name
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
