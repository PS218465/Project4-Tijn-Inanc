<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public function winkelmandjes(){
        return $this->belongsToMany(winkelmandje::class, 'winkelmandje_order', 'order_id');
    }
}
