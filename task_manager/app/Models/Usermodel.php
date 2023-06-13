<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usermodel extends Model
{
    use HasFactory;
    public static function display(){
        echo 'đã tới model';
    }
    static function table(){
        return DB::table('users')->get();
    }
}
