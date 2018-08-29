@extends('layouts.app')
@section('title', '接待餐订餐记录')

@section('content')
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
<div class="panel panel-default">
  <div class="panel-heading">接待餐订餐记录</div>
  <div class="panel-body">
    <ul class="list-group">
 
      <li class="list-group-item">
        <div class="panel panel-default">
          <div class="panel-heading">
          </div>
          <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>用餐日期</th>
                  <th class="text-center">餐厅</th>
                  <th class="text-center">餐别</th>
                  <th class="text-center">人数</th>
                  <th class="text-center">标准</th>
                  <th class="text-center">订餐事由</th>
                  <th class="text-center">操作</th>
                </tr>
              </thead>
             
              <tr>
                <td class="dish-info">
                     2018-08-01

                </td>
                <td class="text-center">
                   第一饭堂
                </td>                
                <td class="text-center">
                   20
                </td>
                <td class="text-center">
                   午餐
                </td>
                <td class="text-center">
                   10元/人
                </td>                
                <td class="text-center">
                   郁南干部交流学习。
                </td>
                 <td  class="text-center">
                  <a class="btn btn-primary btn-xs" href="#">详情</a>
                  <br>
                  <hr>
                  <a class="btn btn-danger btn-xs" href="#">撤餐</a>
                </td>
              </tr>
              <tr>
                <td class="dish-info">
                     2018-08-02

                </td>
                <td class="text-center">
                   第三饭堂
                </td>                
                <td class="text-center">
                   20
                </td>
                <td class="text-center">
                   午餐
                </td>
                <td class="text-center">
                   10元/人
                </td>                
                <td class="text-center">
                   郁南干部交流学习。
                </td>
                 <td  class="text-center">
                  <a class="btn btn-primary btn-xs" href="#">详情</a>
                  <br>
                  <hr>
                  <a class="btn btn-danger btn-xs" href="#">撤餐</a>
                </td>
              </tr>
               
            </table>
          </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
</div>
</div>
@endsection