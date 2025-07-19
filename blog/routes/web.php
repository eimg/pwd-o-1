<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AriticleController;

Route::get('/articles', [AriticleController::class, 'index']);
Route::get('/articles/detail/{id}', [AriticleController::class, 'detail']);

Route::get('/', function () {
    return view('welcome');
});
