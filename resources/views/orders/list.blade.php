@extends('layouts.app')
@section('title', '订餐记录')

@section('content')
@include('common.error')
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
<div class="panel panel-default">
  <div class="panel-heading">订餐记录</div>
  <div class="panel-body">
    <ul class="list-group">
      @foreach($orders as $key =>  $order)
      <li class="list-group-item">
        <span class="badge center">#{{$key + 1}}</span>
        <div class="panel panel-default">
          <div class="panel-heading">
            <small><b>单号：</b>{{ $order->no }}</small>
            <small class="text-muted"><br><b>下单时间：</b><span>{{ $order->created_at->format('Y-m-d H:i:s') }}</span></small>
            <small class="pull-right">
              <span class="label label-info">
              @if($order->paid_at)
                    @if($order->refund_status === \App\Models\Order::REFUND_STATUS_PENDING)
                      已支付
                    @else
                      {{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}
                    @endif
                  @elseif($order->closed)
                    已关闭
                  @else
                    有效
                    <!-- 未支付<br>
                    请于 {{ $order->created_at->addSeconds(config('app.order_ttl'))->format('H:i') }} 前完成支付<br>
                    否则订单将自动关闭 -->
                  @endif
                  </span>
            </small>
          </div>
          <div class="panel-body">
          <div style="overflow:scroll;">
            <table class="table table-bordered" style="width: 110%">
              <thead>
                <tr>
                  <th>菜品信息</th>
                  <th class="text-center">餐厅</th>
                  <th class="text-center">餐别</th>
                  <th class="text-center">用餐日期</th>
                 <!--  <th class="text-center">单价</th>
                  <th class="text-center">数量</th>
                  <th class="text-center">订单总价</th> -->
                  <!-- <th class="text-center">状态</th> -->
                  <th class="text-center">操作</th>
                </tr>
              </thead>
              @foreach($order->items as $index => $item)
              <tr>
                <td class="dish-info">
<!--                   <div class="preview-order">
                    <a target="_blank" href="#">
                      <img src="{{ $item->dish->pic }}">
                    </a>
                  </div> -->
                  <div>
                    <span class="dish-title">
                       <a target="_blank" href="#">{{ $item->dish->name }}</a>
                     </span>
                </td>
                <td class="sku-amount text-center">
                    {{$item->canteen->name}}
                </td>                
                <td class="sku-amount text-center">
                    {{$item->meal->name}}
                </td>                
                <td class="sku-amount text-center">
                    {{$item->order_date->format('Y-m-d')}}
                </td>
<!--                 <td class="sku-price text-center">￥{{ $item->price }}</td>
                <td class="sku-amount text-center">{{ $item->amount }}</td> -->
                @if($index === 0)
<!--                 <td rowspan="{{ count($order->items) }}" class="text-center total-amount">￥{{ $order->total_amount }}</td> -->
<!--                 <td rowspan="{{ count($order->items) }}" class="text-center">
                  @if($order->paid_at)
                    @if($order->refund_status === \App\Models\Order::REFUND_STATUS_PENDING)
                      已支付
                    @else
                      {{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}
                    @endif
                  @elseif($order->closed)
                    已关闭
                  @else
                    有效
                      未支付<br>
                    请于 {{ $order->created_at->addSeconds(config('app.order_ttl'))->format('H:i') }} 前完成支付<br>
                    否则订单将自动关闭  
                  @endif
                </td> -->
                <td rowspan="{{ count($order->items) }}" class="text-center">
                  <a class="btn btn-primary btn-xs" href="{{ route('orders.show', ['order' => $order->id]) }}">详情</a>
                  <br>
                  <hr>
                  <a class="btn btn-danger btn-xs" href="{{ route('orders.close', ['order' => $order->id]) }}">撤餐</a>
                </td>
                @endif
              </tr>
              @endforeach
            </table>
          </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
    <div class="pull-right">{{ $orders->render() }}</div>
  </div>
</div>
</div>
</div>
@endsection