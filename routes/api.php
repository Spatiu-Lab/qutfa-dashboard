<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryControlller;

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


Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::group(['middleware' => 'auth:sanctum'],function() {
    Route::post('logout',[AuthController::class,'logout']);

    Route::resource('products',ProductController::class)->only('index','show');

    Route::resource('categories',CategoryControlller::class)->only('index','show');

    Route::post('orders',[OrderController::class,'index']);

});
