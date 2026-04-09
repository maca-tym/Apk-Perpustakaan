<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Superadmin\UserController;
use App\Http\Controllers\BookController;

Route::view('/', 'welcome');
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout'); 

Route::get('/superadmin/users', [UserController::class,'index']);
Route::get('/superadmin/users/create', [UserController::class,'create']);
Route::post('/superadmin/users/store', [UserController::class,'store']);

Route::view('/superadmin/dashboard', 'superadmin.dashboard');
Route::view('/admin/dashboard', 'admin.dashboard');
Route::resource('books', BookController::class);
Route::view('/user/dashboard', 'user.dashboard');