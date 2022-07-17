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



Route::get('/vscode/{api_key}', function (Request $request){
    \Illuminate\Support\Facades\Log::debug($request->api_key);
    return response()->json(['keldi' => true, 'api_key' => $request->api_key]);
});
