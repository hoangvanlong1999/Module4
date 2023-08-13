<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderdetailController;
use App\Http\Controllers\groupController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('shop1')->group(function () {
    Route::get('/', [shopController::class, 'index'])->name('shop.home');
    Route::get('show/{slug}', [shopController::class, 'show'])->name('shop.show');
    Route::get('/cart', [shopController::class, 'cart'])->name('cart.index');
    Route::get('/addtocart/{id}', [shopController::class, 'addtocart'])->name('shop.addtocart');
    Route::get('/checkOuts', [shopController::class, 'checkOuts'])->name('checkOuts');
    Route::patch('update-cart', [shopController::class, 'update']);
    Route::delete('remove-from-cart', [shopController::class, 'remove']);
    Route::post('/order', [shopController::class, 'order'])->name('orders');
    //đăng nhập shop
    Route::get('/login', [shopController::class, 'login'])->name('shop.login');
    Route::post('/checklogin', [shopController::class, 'checklogin'])->name('shop.checklogin');
    //đăng kí
    Route::get('/register', [shopController::class, 'register'])->name('shop.register');
    Route::post('/checkregister', [shopController::class, 'checkregister'])->name('shop.checkregister');
    //đăng xuất shop
    Route::post('/logout', [shopController::class, 'logout'])->name('shop.logout');
    Route::get('/shopsearch', [shopController::class, 'shopsearch'])->name('shop.search');
});




// Route::get('/search/{search}', [UserController::class,'search'])->name('users.search');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('customers', CustomersController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderdetails', OrderdetailController::class);
Route::prefix('groups')->group(function () {
    Route::get('/', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/store', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('groups.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('groups.update');
    Route::get('/destroy/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');
    Route::get('/search', [GroupController::class, 'search'])->name('groups.search');
    Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('groups.detail');
    Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('groups.group_detail');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/checkLogin', [AuthController::class, 'postLogin'])->name('checkLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('/post_forgot_password', [AuthController::class, 'post_forgot_password'])->name('post_forgot_password');