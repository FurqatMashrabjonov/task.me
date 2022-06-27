<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'index');
Route::get('/{category}', 'show');
Route::post('/', 'store');
Route::put('/{category}', 'update');
Route::delete('/{category}', 'destroy');
