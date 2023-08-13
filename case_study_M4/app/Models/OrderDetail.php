<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    public function products(){
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function orders(){
        return $this->belongsTo(Order::class)->withTrashed();
    }

}
