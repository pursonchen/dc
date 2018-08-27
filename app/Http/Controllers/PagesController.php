<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function orderstore(OrderRequest $request)
    {
        $user  = $request->user();
         
         //判断是否曾经订餐 
        $booked = false;
        $userItems = User::with('items')->where('id','=',$user->id)->get();
         

        foreach ($userItems as $value) 
        {
           foreach ($value->items as $item) 
           {
            if (Carbon::parse($item->order_date)->format("Y-m-d") === $request->date) {
                 $booked = true;
            }
            
           }
        }
        
        if($booked)
            return redirect()->route('root')->with('danger', '已经订过了！');
 
        // 开启一个数据库事务
        $order = \DB::transaction(function () use ($user, $request) {

            $order   = new Order([
                'remark'       => 'hello',
                'total_amount' => 0,
            ]);
            // 订单关联到当前用户
            $order->user()->associate($user);
            // 写入数据库
            $order->save();

            $totalAmount = 0;

            $listItems       = $request->input('listItems');

            // 遍历用户提交的菜单
            foreach ($listItems as $data) {
                $dish  = Dish::find($data);
                // 创建一个 OrderItem 并直接与当前订单关联
                $item = $order->items()->make([
                    'amount' => 1,
                    'price'  => $dish->price,
                    'order_date' => $dish->date,
                    'created_at' => Carbon::now(),
                ]);
                $item->dish()->associate($dish->id);
                $item->meal()->associate($dish->meal_id);
                $item->canteen()->associate($dish->canteen_id);
                $item->save();
                $totalAmount += $dish->price ;
            }

            // 更新订单总金额
            $order->update(['total_amount' => $totalAmount]);

            return $order;
        });

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
