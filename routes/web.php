<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// sementara dashboard dulu
Route::view('/admin/dashboard', 'admin.dashboard');
Route::view('/user/dashboard', 'user.dashboard');