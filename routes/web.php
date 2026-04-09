<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Superadmin\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

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
Route::get('loan', [LoanController::class, 'indexAdmin']);
Route::resource('books', BookController::class);
Route::view('/user/dashboard', 'user.dashboard');
Route::get('buku', [BookController::class,'indexUser']);
Route::resource('loans', LoanController::class)->except(['show', 'edit', 'update', 'destroy']);

    // Pengembalian Buku
    Route::get('loans/{loan}/return', [LoanController::class, 'returnForm'])->name('loans.return');
    Route::post('loans/{loan}/return', [LoanController::class, 'returnBook'])->name('loans.return.process');