<?php


use Illuminate\Support\Facades\Route;

Route::get('/', 'index');
Route::get('/{food}', 'show');
Route::post('/', 'store');
Route::put('/{food}', 'update');
Route::delete('/{food}', 'destroy');
