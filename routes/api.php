<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryControlller;
use App\Http\Controllers\Api\ProductController;
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


Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::group(['middleware' => 'auth:sanctum'],function() {
    Route::post('logout',[AuthController::class,'logout']);

    Route::get('products/search',[ProductController::class,'search']);
    Route::resource('products',ProductController::class)->only('index','show');

    Route::get('categories/search',[CategoryControlller::class,'search']);
    Route::resource('categories',CategoryControlller::class)->only('index','show');

});
