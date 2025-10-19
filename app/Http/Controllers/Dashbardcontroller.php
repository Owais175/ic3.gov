<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Dashbardcontroller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->role === '1') {
            return view('dashboard', compact('user'));
        }
        return view('dashboard', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
    }

    public function contactshow()
    {

        $contact = Contact::all();
        return view('admin.contact', compact('contact'));
    }

    public function tracking()
    {
        $user = Auth::user();

        if ($user->role == 1) {
            $complaints = Complaint::with(['transactions', 'subjects'])->latest()->get();
        } else {
            $complaints = Complaint::with(['transactions', 'subjects'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return view('track-order', compact('complaints'));
    }
}
