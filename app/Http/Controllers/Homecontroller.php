<?php

namespace App\Http\Controllers;

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
}
