<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Superadmin\UserController;

Route::view('/', 'welcome');
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/superadmin/users', [UserController::class,'index']);
Route::get('/superadmin/users/create', [UserController::class,'create']);
Route::post('/superadmin/users/store', [UserController::class,'store']);

Route::view('/superadmin/dashboard', 'superadmin.dashboard');
Route::view('/superadmin/dashboard', 'superadmin.dashboard');
Route::view('/user/dashboard', 'user.dashboard');