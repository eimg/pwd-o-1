<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AriticleController;
use App\Http\Controllers\CommentController;

Route::get('/articles', [AriticleController::class, 'index']);
Route::get('/articles/detail/{id}', [AriticleController::class, 'detail']);
Route::get('/articles/delete/{id}', [AriticleController::class, 'delete']);

Route::get('/articles/edit/{id}', [AriticleController::class, 'edit']);
Route::post('/articles/edit/{id}', [AriticleController::class, 'update']);

Route::get('/articles/add', [AriticleController::class, 'add']);
Route::post('/articles/add', [AriticleController::class, 'create']);

Route::post('/comments/add', [CommentController::class, 'create']);
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);

Route::get('/', [AriticleController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
