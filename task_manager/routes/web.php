<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Tạo 1 nhóm route với tiền tố customer
Route::group(['prefix'=>'customers'],function () {
    route::get('/index',[UserController::class,'index'])->name('customers.index');
    route::get('/edit/{id?}',[UserController::class,'edit'])->name('customers.edit');
    Route::put('/update/{id?}', [UserController::class, 'update'])->name('customers.update');

});
Route::get('/laravel',[UserController::class,'table'])->name('users.table');
Route::get('/edit',[UserController::class,'getedit'])->name('users.table');

