<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
     protected $fillable = [
        'name',
        'address'
    ];
    
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
