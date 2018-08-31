@extends('layouts.app')
@section('title', '接待餐订餐记录')
@section('content')
@include('common.error')
<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">接待餐订餐记录</div>
      <div class="panel-body">

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>序号</th>
                <th>用餐开始日期</th>
                <th>用餐结束日期</th>
                <th class="text-center">餐厅</th>
                <th class="text-center">餐别</th>
                <th class="text-center">人数</th>
                <th class="text-center">标准</th>
                <th class="text-center">订餐事由</th>
                <th class="text-center">状态</th>
                <th class="text-center">操作</th>
              </tr>
            </thead>
            @foreach ($receptions as $key => $reception)
            <div>
              <tr>
                <td><span class="badge center">#{{$key + 1}}</span>
              </td>
              <td class="dish-info">
                {{$reception->order_sdate}}
              </td>
              <td class="dish-info">
                {{$reception->order_edate}}
              </td>
              <td class="text-center">
                {{$reception->canteen->name}}
              </td>
              <td class="text-center">
                {{$reception->meal->name}}
              </td>
              <td class="text-center">
                {{$reception->num}}
              </td>
              <td class="text-center">
                {{$reception->std}}元/人
              </td>
              <td class="text-center">
                {{$reception->description}}
              </td>
              <td class="text-center">
                  <span class="label label-info">
                  @if($reception->closed)
                    已关闭
                  @else
                    有效
                    @endif
                  </span>
              </td>
              <td  class="text-center">
                <a class="btn btn-danger btn-xs" href="{{ route('reception.close', ['reception' => $reception->id]) }}">撤餐</a>
              </td>
            </tr>
          </div>
          @endforeach
          
        </table>
      </div>
      

    </div>
  </div>
</div>
</div>
@endsection