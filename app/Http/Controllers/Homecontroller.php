<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function privacy_policy()
    {
        return view('privacy-policy');
    }
    public function complaint()
    {
        return view('complaint-form');
    }

    public function contactsubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|max:250|unique:contacts,email',
            "phone" => 'required',
            'address' => 'required|max:150',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            "phone" => $request->input('phone'),
            'address' => $request->input('address'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('contact')
            ->with('success', '✅ Thank you! Your message has been sent successfully.');
    }
}
