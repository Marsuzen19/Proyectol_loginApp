<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //esto puede dar error lo puse por sugerencia
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Lo que esta en azul al final del route son funciones que deben estar en LoginController
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//aca podria faltarme la ruta que coincida con la direccion del uri en .env

Route::middleware(['auth'])->get('/dashboard', function(){
    return view('dashboard');
});