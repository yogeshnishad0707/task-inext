<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;

// Route::get('/', function () {
//     return view('multiplefile');
// });

Route::get('registerform',[AuthController::class,'registerForm'])->name('registerform');
Route::post('register',[AuthController::class,'registerInsert'])->name('register');

Route::get('loginform',[AuthController::class,'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::resource('upload',UploadController::class);

Route::middleware(['auth'])->group( function(){
    Route::resource('user',UserController::class);
    Route::get('logout',[AuthController::class,'logout']);
});