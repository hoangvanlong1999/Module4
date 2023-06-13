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

Route::get('/long', function () {
    return view('display');
});


Route::post('/long', function (Request $request) {
    $key = $request->input('key');
    $english = ['hello'=>'xin chào',
                'goodbye' => 'tạm biệt',
                'love' => 'yêu'
            ];
    foreach($english as $key1 => $value){
        if ($key===$key1){
            $kq = $value;
            break;
        }else{
            $kq = 'không có trong từ điển';
        }
    }
    return view('kq',compact(['kq']));
});