<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


Route::middleware('auth:api')->group(/**
 *
 */
    function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('products',ProductController::class);
    Route::resource('users',UserController::class);
    Route::resource('product_prices',\App\Http\Controllers\ProductPriceController::class);
});



