<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/publishers/{publisher}', [PublisherController::class, 'show'])->name('publishers.show');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::put('/profile', [DashboardController::class, 'update'])->name('dashboard.profile.update');

        Route::get('/publisher', [PublisherController::class, 'create'])->name('publisher.create');
        Route::post('/publisher', [PublisherController::class, 'store'])->name('publisher.store');

        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/saved', [PostController::class, 'savedPosts'])->name('posts.saved');
        Route::get('/posts/myposts', [PostController::class, 'myPosts'])->name('posts.myposts');
    });

    Route::post('/posts/{post}/toggle-save', [PostController::class, 'toggleSave'])->name('posts.toggle_save');
});
