<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth.basic')->get('/user', function (Request $request)
{
    return $request->user();
}
);
//podria dar error si no cambia el user de uno de los dos