<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('majors', MajorController::class);
Route::resource('classes', SchoolClassController::class);
Route::resource('students', StudentController::class);
Route::resource('transactions', TransactionController::class);

// Authentication Routes
Route::get('register', [AuthController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('register', [AuthController::class, 'register'])->middleware('guest');
Route::get('login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
