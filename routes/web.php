<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Dashbardcontroller;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', [Homecontroller::class, 'index'])->name('index');
Route::get('about', [Homecontroller::class, 'about'])->name('about');
Route::get('contact', [Homecontroller::class, 'contact'])->name('contact');
Route::get('complaint-form', [Homecontroller::class, 'complaint'])->name('complaint');
Route::get('privacy-policy', [Homecontroller::class, 'privacy_policy'])->name('privacy-policy');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('registeruser');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('dashboard', [Dashbardcontroller::class, 'index'])->name('dashboard');
Route::get('profile', [Dashbardcontroller::class, 'profile'])->name('user.profile');
Route::get('profile-edit', [Dashbardcontroller::class, 'edit'])->name('user.edit');
Route::put('profile-update', [Dashbardcontroller::class, 'update'])->name('user.update');

// // Dashboards
// Route::middleware(['auth', 'role:2'])->get('dashboard', function () {
//     return view('user.dashboard');
// })->name('user.dashboard');

// Route::middleware(['auth', 'role:1'])->get('dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

// routes/web.php
Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint.form');
Route::post('/complaint/submit', [ComplaintController::class, 'submitComplaint'])->name('complaint.submit');

Route::middleware('auth')->get('dashboard', function () {
    $user = Auth::user();
    return view('dashboard', compact('user'));
})->name('dashboard');
