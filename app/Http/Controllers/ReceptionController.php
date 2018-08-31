<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Canteen;
use App\Http\Requests\ReceptionRequest;
use Auth;
use App\Models\Reception;

class ReceptionController extends Controller
{
            public function __construct()
    {
        $this->middleware('auth', ['except' => ['permission-denied']]);
    }

    public function reception()
    {
        $today = Carbon::today()->format("Y-m-d");
       
       $tomorrow = Carbon::tomorrow()->format("Y-m-d"); 
        
       $canteens = Canteen::all();

         return view('reception.index', compact('today','tomorrow', 'canteens'));
    }

    public function store(ReceptionRequest $request, Reception $reception)
    {
        $reception -> order_sdate = $request-> sdate;
        $reception -> order_edate = $request-> edate;
        $reception -> canteen_id = $request-> canteen;
        $reception -> meal_id = $request-> mckbox;
        $reception -> std = $request-> std;
        $reception -> num = $request-> num;
        $reception -> description = $request -> description;
        $reception -> save();

        return redirect()->route('reception.list')->with('success','订餐成功！');
    }

    public function list() 
    {
         return view('reception.list');
    }
}
