<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::apiResource('/categories', CategoryController::class);

Route::post('/login', function(Request $request) {
    $email = $request->email;
    $password = $request->password;

    if($email == "" or $password == "") {
        return response(['msg' => 'email and password required'], 400);
    }

    $user = User::where("email", $email)->first();
    if($user) {
        if(Hash::check($password, $user->password)) {
            return $user->createToken("api")->plainTextToken;
        }
    }

    return response(['msg' => 'invalid email or password'], 401);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
