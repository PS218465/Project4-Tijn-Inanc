<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    use HasFactory;
    public function pizzas(){
        return $this->belongsToMany(pizza::class, 'pizza_ingredient', 'ingredient_id');
    }
}
