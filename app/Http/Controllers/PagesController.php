<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Dish;
use App\Models\Canteen;


class PagesController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth', ['except' => ['permission-denied']]);
    }

     public function root()
    {
       $today = Carbon::today()->format("Y-m-d");
       
       $tomorrow = Carbon::tomorrow()->format("Y-m-d"); 
        
       $canteens = Canteen::all();

        return view('pages.root', compact('today','tomorrow', 'canteens')); 
    }

    public function neworder(Request $request, Order $order)
    {
        // $order->fill($request->all());
        // $order->user_id = Auth::id();
        // $order->save();

       $today = Carbon::today()->format("Y-m-d");
       
       $tomorrow = Carbon::tomorrow()->format("Y-m-d"); 
        
       $canteens = Canteen::all();
        return redirect()->route('root')->with('success', '成功订餐！');
    }

   //ajax 获取菜谱
    public function getdish(Request $request) 
    {

        $today = Carbon::today();

       if($request -> date >=  $today && $request -> canteen_id !== null && $request -> meal_id !== null)
       {
           return  Dish::where('date','=',$request -> date)->where('canteen_id','=',$request -> canteen_id)->where('meal_id','=',$request -> meal_id)->get();
       }

       return 0;
    }

    public function record(User $user) 
    {
        return view('pages.record');
    }

    public function permissionDenied()
    {
        // 如果当前用户有权限访问后台，直接跳转访问
        if (config('administrator.permission')()) {
            return redirect(url(config('administrator.uri')), 302);
        }
        // 否则使用视图
        return view('pages.permission_denied');
    }
}
