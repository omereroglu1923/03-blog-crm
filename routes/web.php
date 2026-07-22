<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CommentController;

// Sadece giriş yapmamış kullanıcılar erişebilir
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'create'])->name('login.create');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Sadece giriş yapmış kullanıcılar erişebilir
Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');

    // ÖNEMLİ: /blog/create gibi sabit path'ler, aşağıdaki {post:slug}
    // wildcard route'undan ÖNCE tanımlanmalı — yoksa Laravel "create"i
    // bir slug sanıp Post::where('slug', 'create') arar.
    Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
    Route::post('/blog', [PostController::class, 'store'])->name('blog.store');
    Route::get('/blog/{post:slug}/edit', [PostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{post:slug}', [PostController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{post:slug}', [PostController::class, 'destroy'])->name('blog.destroy');

    Route::post('/blog/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/blog/{post:slug}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('blog.show');
