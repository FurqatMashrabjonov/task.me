<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

//    Route::group(['prefix' => 'admin'], __DIR__ . '/admin/index.php');

});



Route::get('/vscode', function (){
    \Illuminate\Support\Facades\Log::debug('keldiiiiiiiiii');
    return response()->json(['keldi' => true]);
});
