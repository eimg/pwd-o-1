<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AriticleController;

Route::get('/articles', [AriticleController::class, 'index']);
Route::get('/articles/detail/{id}', [AriticleController::class, 'detail']);
Route::get('/articles/delete/{id}', [AriticleController::class, 'delete']);

Route::get('/articles/add', [AriticleController::class, 'add']);
Route::post('/articles/add', [AriticleController::class, 'create']);

Route::get('/', [AriticleController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
