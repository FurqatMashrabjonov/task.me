<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->prefix('categories')
//    ->middleware('auth:sanctum');
    ->group(__DIR__ . '/categories.php');

Route::controller(FoodController::class)->prefix('foods')
//    ->middleware('auth:sanctum');
    ->group(__DIR__ . '/foods.php');
