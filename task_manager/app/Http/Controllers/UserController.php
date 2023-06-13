<?php

namespace App\Http\Controllers;
use App\Models\Usermodel;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function getedit(){
        return view('edit');
    }
    public function edit(Request $request){
        Usermodel::edit($request);
        header();
    }
    public function table(){
        $result = Usermodel::table();
        dd($result);
        // return view('table',compact('result'));
    }
    public function update(){
        // return Models('Usermodel');
        Usermodel::display();
        // echo 'đã up';
    }
}
