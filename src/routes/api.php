<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Qiita\Articles\IndexController;
use App\Http\Controllers\Api\V1\StarWarsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("api/v1")->group(function() {
    Route::prefix("/qiita")->group(function() {
        Route::get('/articles', IndexController::class);
    });
    Route::get("/baconipsum", StarWarsController::class);
});
