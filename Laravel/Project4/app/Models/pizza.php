<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizza extends Model
{
    use HasFactory;
    public function ingredients(){
        return $this->belongsToMany(ingredient::class, 'pizza_ingredient', 'pizza_id');
    }
}
