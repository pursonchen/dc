<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'dishtype_id',
        'canteen_id',
        'unit',
        'price',
        'pic',
        'remark'
    ];

    public function canteen()
    {
        return $this->belongsTo(Canteen::class);
    }

        public function dishtype()
    {
        return $this->belongsTo(Dishtype::class);
    }

   
}
