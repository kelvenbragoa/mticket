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


//ROTAS PROTOCOLO
Route::post('/protocol-login', [\App\Http\Controllers\Api\Protocols\AuthController::class, 'login']);
Route::get('/protocol-user/{id}', [\App\Http\Controllers\Api\Protocols\AuthController::class, 'user']);
Route::get('/category',[\App\Http\Controllers\Api\CategoryController::class,'index']);
Route::get('/category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'show']);
Route::get('/home/{id}', [\App\Http\Controllers\Api\Protocols\HomeController::class, 'index']);
Route::get('/alltickets/{id}', [\App\Http\Controllers\Api\Protocols\TicketsController::class, 'index']);
Route::get('/donetickets/{id}', [\App\Http\Controllers\Api\Protocols\TicketsController::class, 'done']);
Route::get('/pendingtickets/{id}', [\App\Http\Controllers\Api\Protocols\TicketsController::class, 'pending']);
Route::get('/ticket/{id}', [\App\Http\Controllers\Api\Protocols\TicketsController::class, 'ticketdetail']);
Route::get('/verifyticket/{id}', [\App\Http\Controllers\Api\Protocols\TicketsController::class, 'verifyticket']);
Route::get('/products/{id}', [\App\Http\Controllers\Api\Protocols\ProductsController::class, 'index']);
Route::get('/product/{id}', [\App\Http\Controllers\Api\Protocols\ProductsController::class, 'productdetail']);
Route::post('carts', [\App\Http\Controllers\Api\Protocols\CartsController::class, 'store']);
Route::get('/cart/{id}', [\App\Http\Controllers\Api\Protocols\CartsController::class, 'index']);
Route::post('/sells', [\App\Http\Controllers\Api\Protocols\SellController::class, 'store']);
Route::get('/sells/{id}', [\App\Http\Controllers\Api\Protocols\SellController::class, 'index']);
Route::get('/sells-detail/{id}', [\App\Http\Controllers\Api\Protocols\SellController::class, 'selldetails']);
Route::delete('/cart/{id}/user/{userid}',[\App\Http\Controllers\Api\Protocols\CartsController::class,'destroy']);

//ROTAS BARMAN

Route::post('/barman-login', [\App\Http\Controllers\Api\Barman\AuthController::class, 'login']);
Route::get('/barman-user/{id}', [\App\Http\Controllers\Api\Barman\AuthController::class, 'user']);
Route::get('/barman-home/{id}', [\App\Http\Controllers\Api\Barman\HomeController::class, 'index']);
Route::get('/barman-products/{id}', [\App\Http\Controllers\Api\Barman\ProductsController::class, 'index']);
Route::get('/barman-product/{id}', [\App\Http\Controllers\Api\Barman\ProductsController::class, 'productdetail']);
Route::post('barman-carts', [\App\Http\Controllers\Api\Barman\CartController::class, 'store']);
Route::get('barman-cart/{id}', [\App\Http\Controllers\Api\Barman\CartController::class, 'index']);
Route::delete('/barman-cart/{id}/user/{userid}',[\App\Http\Controllers\Api\Barman\CartController::class,'destroy']);
Route::post('/barman-sells', [\App\Http\Controllers\Api\Barman\SellController::class, 'store']);
Route::get('/barman-sells/{id}', [\App\Http\Controllers\Api\Barman\SellController::class, 'index']);
Route::get('/barman-sells-detail/{id}', [\App\Http\Controllers\Api\Barman\SellController::class, 'selldetails']);
Route::get('/verifyreceipt/{id}/user/{userid}', [\App\Http\Controllers\Api\Barman\SellController::class, 'verifyreceipt']);
Route::get('/barman-register-card/{id}', [\App\Http\Controllers\Api\Barman\CardController::class, 'registerCard']);
Route::get('/barman-view-card/{id}', [\App\Http\Controllers\Api\Barman\CardController::class, 'viewCard']);
Route::get('/barman-topup-card/{id}/{top}', [\App\Http\Controllers\Api\Barman\CardController::class, 'topUpCard']);






