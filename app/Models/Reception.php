<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
     protected $fillable = [
        'order_sdate',
        'order_edate',
        'std',
        'num',
        'description',
        'closed'
    ];

    
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }    

    public function canteen()
    {
        return $this->belongsTo(Canteen::class);
    }  

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
