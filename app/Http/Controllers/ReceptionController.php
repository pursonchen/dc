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
        $reception -> user_id = $request->user()-> id;
        $reception -> canteen_id = $request-> canteen;
        $reception -> meal_id = $request-> mckbox;
        $reception -> std = $request-> std;
        $reception -> num = $request-> num;
        $reception -> description = $request -> description;
        $reception -> closed = false;
        $reception -> save();

        return redirect()->route('reception.list')->with('success','订餐成功！');
    }

    public function list(Request $request) 
    {
        $receptions = Reception::with('meal','canteen','user') 
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();
        return view('reception.list', compact('receptions'));
      
    }


    // 取消订单
    public function close(Reception $reception, Request $request)
    {
       // $this->authorize('own', $order);
       
       $reception->find($request->reception);
      
        // 只能提前一天取消
          if (Carbon::parse($reception->order_edate)->format("Y-m-d") <=Carbon::today()->format('Y-m-d')) 
          {
           return redirect()->route('reception.list')->with('danger', '只能在用餐时间段取消订餐');
        
         }

        $reception->update(['closed' => true]);
        return redirect()->route('reception.list')->with('success', '取消订餐成功！');
    }

}
