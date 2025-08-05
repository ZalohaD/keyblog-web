<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

#TODO Create separate logic for publisher that can create account in dashboard
//Route::post('/register/publisher', [RegisterController::class, 'publisher'])->name('register.publisher');

