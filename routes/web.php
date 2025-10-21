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
Route::post('contactsubmit', [Homecontroller::class, 'contactsubmit'])->name('contactsubmit');
Route::get('faq', [Homecontroller::class, 'faq'])->name('faq');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register/send-otp', [AuthController::class, 'registerSendOtp'])->name('register.sendOtp');
Route::post('/register/verify-otp', [AuthController::class, 'registerVerifyOtp'])->name('register.verifyOtp');
Route::get('/login', [AuthController::class, 'showloginForm'])->name('auth.login');
Route::post('/login/send-otp', [AuthController::class, 'sendOtp'])->name('login.sendOtp');
Route::post('/login/verify', [AuthController::class, 'verifyOtp'])->name('login.verify');
Route::post('/register', [AuthController::class, 'register'])->name('registeruser');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [Dashbardcontroller::class, 'index'])->name('dashboard');
    Route::get('profile', [Dashbardcontroller::class, 'profile'])->name('user.profile');
    Route::get('profile-edit', [Dashbardcontroller::class, 'edit'])->name('user.edit');
    Route::put('profile-update', [Dashbardcontroller::class, 'update'])->name('user.update');
    Route::get('User-contact', [Dashbardcontroller::class, 'contactshow'])->name('admin.contact');
    Route::get('track-order', [Dashbardcontroller::class, 'tracking'])->name('track-order');
    Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaint-form');

    Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');

    Route::get('/complaints/{id}', [ComplaintController::class, 'show'])->name('complaints.show');

    Route::put('/complaints/{id}/approve', [ComplaintController::class, 'approve'])->name('complaint.approve');
});
