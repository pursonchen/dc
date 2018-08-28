<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Canteen;

class ReceptionController extends Controller
{
    public function reception()
    {
        $today = Carbon::today()->format("Y-m-d");
       
       $tomorrow = Carbon::tomorrow()->format("Y-m-d"); 
        
       $canteens = Canteen::all();

         return view('reception.index', compact('today','tomorrow', 'canteens'));
    }

    public function store()
    {
        return redirect()->route('reception')->with('success','目前仅展示使用，功能将很快完善！');
    }

    public function list() 
    {
         return view('reception.list');
    }
}
