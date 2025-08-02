<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AuthUserDetail;
use Spatie\Permission\Traits\HasRoles;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product/login', [RegisterController::class, 'login'])->name('login');

Route::post('/product/login', [RegisterController::class, 'logincheck'])->name('logincheck');




Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');






Route::post('/product/logout', [RegisterController::class, 'logout'])->name('logout');
Route::get('/product/register', [RegisterController::class, 'register'])->name('register');
Route::post('/product/register', [RegisterController::class, 'storeUser'])->name('product.storeuser');

Route::get('/forgot-password', [RegisterController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [RegisterController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [RegisterController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [registerController::class, 'updatePassword'])->name('password.update');


Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');



