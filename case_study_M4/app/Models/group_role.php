<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_role extends Model
{
    use HasFactory;
    public function roles(){
        return $this->belongsTo(role::class)->withTrashed();
    }
    public function groups(){
        return $this->belongsTo(group::class)->withTrashed();
    }
}
