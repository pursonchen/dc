<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Dish;

class DishesController extends Controller
{
    public function show(Product $dish, Request $request)
    {
        
        // 最后别忘了注入到模板中
        return view('dishes.show', [
            'dish' => $dish,
        ]);
    }
}
