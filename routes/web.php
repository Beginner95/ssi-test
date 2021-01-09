<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/admin/login', [UserController::class, 'login'])->name('login');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
