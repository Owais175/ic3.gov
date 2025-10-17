<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admin\AuthController;



Route::get('/', [Homecontroller::class, 'index'])->name('index');
Route::get('about', [Homecontroller::class, 'about'])->name('about');
Route::get('contact', [Homecontroller::class, 'contact'])->name('contact');
Route::get('complaint-form', [Homecontroller::class, 'complaint'])->name('complaint');
Route::get('privacy-policy', [Homecontroller::class, 'privacy_policy'])->name('privacy-policy');



Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegister'])->name('admin.register');
Route::post('admin-register', [AuthController::class, 'register'])->name('registerdata');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});
