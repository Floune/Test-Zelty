<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[\App\Http\Controllers\API\LoginController::class,'login']);
Route::post('register',[\App\Http\Controllers\API\RegisterController::class,'register']);

Route::middleware('auth:api')->group(function(){
    Route::post('post/create',[\App\Http\Controllers\API\PostController::class,'create']);
    Route::post('post/update',[\App\Http\Controllers\API\PostController::class,'update']);
    Route::delete('post/delete/{id}',[\App\Http\Controllers\API\PostController::class,'delete']);
    Route::post('post/index',[\App\Http\Controllers\API\PostController::class,'index']);
});
