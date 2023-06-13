<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;



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

Route::get('/', function () {
    return view('layouts.master');
});

Route::group(['prefix' => 'users'], function(){
    route::get('/index',[UserController::class,'index'])->name('users.index');
    route::get('/create',[UserController::class,'create'])->name('users.create');
    route::post('/store',[UserController::class,'store'])->name('users.store');
});
Route::resource('categories',CategoryController::class);
