<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class winkelmandje extends Model
{
    use HasFactory;
    public function orders(){
        return $this->belongsToMany(order::class, 'winkelmandje_order', 'winkelmandje_id');
    }
}
