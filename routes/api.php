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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/protocol-login', [\App\Http\Controllers\Api\Protocols\AuthController::class, 'login']);
Route::get('/category',[\App\Http\Controllers\Api\CategoryController::class,'index']);
Route::get('/category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'show']);

Route::get('/home/{id}', [\App\Http\Controllers\Api\Protocols\HomeController::class, 'index']);
