<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['amount', 'price', 'order_date'];
    protected $dates = ['order_date'];
    public $timestamps = false;

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }    

    public function canteen()
    {
        return $this->belongsTo(Canteen::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
