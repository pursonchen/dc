<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
    'name',
    'order_start_time',
    'order_end_time',
    'eat_start_time',
    'eat_end_time'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

        public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

        public function canteens()
    {
        return $this->hasMany(Canteen::class);
    }
}
