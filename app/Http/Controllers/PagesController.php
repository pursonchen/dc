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

    public function orders(OrderRequest $request)
    {
        
        if($request->date <= Carbon::today()->format("Y-m-d")) {
          return redirect()->route('root')->with('danger', '不能订以前的菜式');
        }
        $user  = $request->user();
         
         //判断是否曾经订餐 
        $booked = false;
          $orders = Order::query()
            ->with('items')
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
           
       

           foreach ($orders as $index => $item) 
           {             

            if (Carbon::parse($item->items[0]->order_date)->format("Y-m-d") === $request->date && $item->closed === false) {
                 $booked = true;
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

       if($request -> canteen_id !== null && $request -> meal_id !== null)
       {
           return  Dish::where('date','=',$request -> date)->where('canteen_id','=',$request -> canteen_id)->where('meal_id','=',$request -> meal_id)->get();
       }

       return 0;
    }

// 获取订餐记录
    public function orderslist(Request $request) 
    {
       // 权限校验
       
        $orders = Order::query()
            // 使用 with 方法预加载，避免N + 1问题
            ->with(['items.dish', 'items.meal','items.canteen','items.order']) 
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('orders.list', ['orders' => $orders]);
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

   // 订单详情
    public function ordershow(Order $order, Request $request)
    {
      // 权限校验
       $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load(['items.dish', 'items.meal','items.canteen','items.order'])]);
    }

    // 取消订单
    public function orderclose(Order $order, Request $request)
    {
       $this->authorize('own', $order);
       
       $order->with(['items.dish', 'items.meal','items.canteen','items.order'])
        ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();
       
       foreach ($order->items as $index => $item) {
        // 只能提前一天取消
          if (Carbon::parse($item->order_date)->format("Y-m-d") <= Carbon::today()->format('Y-m-d')) {
           return redirect()->route('orders.list')->with('danger', '只能提前一天取消订餐');
        }
       }

        $order->update(['closed' => true]);
        return redirect()->route('orders.list')->with('success', '取消订餐成功！');
    }
}
