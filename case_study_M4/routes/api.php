<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
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

Route::apiResource('users',UserController::class);
Route::apiResource('products',ProductController::class);
Route::get('/products/{id}', [ProductController::class],'show');
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('/login_customer', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);
});

Route::get('carts',[CartController::class,'getAllCart']);
Route::post('add_to_cart',[CartController::class,'addToCart']);
Route::put('update_cart',[CartController::class,'update']);
Route::delete('carts/remove_cart/{id}',[CartController::class,'removeToCart']);
Route::get('product_list/search',[ProductController::class,'search']);

// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::post('register', 'register');
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');
// });


Route::post('orders/checkout',[OrderController::class,'checkout']);
