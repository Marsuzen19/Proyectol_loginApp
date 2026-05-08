<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación estándar de Laravel
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// RUTAS DE GOOGLE (Asegúrate de que coincidan con tu botón y con el .env)
Route::get('/auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    });
});