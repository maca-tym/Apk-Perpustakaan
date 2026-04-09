<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;

Route::view('/', 'welcome');
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin/users', [UserController::class,'index']);
Route::get('/admin/users/create', [UserController::class,'create']);
Route::post('/admin/users/store', [UserController::class,'store']);

// sementara dashboard dulu
Route::view('/admin/dashboard', 'admin.dashboard');
Route::view('/user/dashboard', 'user.dashboard');