<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\VscodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

//    Route::group(['prefix' => 'admin'], __DIR__ . '/admin/index.php');

});



Route::post('/vscode/{token}', [VscodeController::class, 'main']);
//Route::get('/vscode/{token}', [VscodeController::class, 'main']);

Route::any('/github', function (Request $request){
    \Illuminate\Support\Facades\Log::debug(json_encode($request->all()));
    return true;
});
