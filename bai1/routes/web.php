<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/calculate-discount', function (){
    return view('calculate_discount');
});


Route::post('/calculate-discount', function (Request $request) {
    $productDescription = $request->input('product_description');
    $price = $request->input('list_price');
    $discountPercent = $request->input('discount_percent');
    $discountAmount = $price * $discountPercent * 0.1;
    $discountPrice = $price - $discountAmount;
    return view('show_discount_amount', compact(['discountPrice', 'discountAmount', 'productDescription', 'price', 'discountPercent']));
});
