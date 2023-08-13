<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function categories(){
        return $this->belongsTo(Category::class)->withTrashed();
    }
    public function orderdetails(){
        return $this->hasMany(Orderdetail::class, 'product_id','id');
    }
}
