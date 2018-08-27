@extends('layouts.app')
@section('title', '订餐记录')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 user-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <table class="table table-bordered">
                        <caption>个人报餐记录：</caption>
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>订餐时间</th>
                                <th>餐厅</th>
                                <th>餐别</th>
                                <th>菜品</th>
                               <!--  <th class=".visible-lg-*">是否支付</th>
                                <th class=".visible-lg-*">消费</th>
                                <th class=".visible-lg-*">支付方式</th> -->
                                <th>撤消订餐</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="hidden">
                                {{$i = 1}}
                            </div>
                            @foreach($userItems as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->items[0]->order_date}}</td>
                                <td>第{{$item->items[0]->canteen_id}}饭堂</td>
                                <td>{{$item->items[0]->meal_id}}</td>
                                <td>
                               @foreach($item->items as $data)
                                {{ $data->dish_id }} ;
                               @endforeach
                               </td>
<!--                                 <td>是</td>
                                <td>13.80元</td>
                                <td>微信</td> -->
                                <td><button type="button" class="btn btn-xs btn-danger" disabled>撤销</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop