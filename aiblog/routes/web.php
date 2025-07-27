<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Blog routes
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/category/{category}', [PostController::class, 'category'])->name('posts.category');

// Post CRUD routes
Route::resource('posts', PostController::class)->except(['index']);

// Comment routes
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
