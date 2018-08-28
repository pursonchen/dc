  @extends('layouts.app')
  @section('title', '报餐宝')
  @section('content')
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 user-info">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="media">

            <h5><strong>欢迎你！</strong></h5>
            <p>当前时间：{{ $today }}</p>
            <div class="media-body">
              <hr>
              <div align="center">
                <img class="img-circle" src="{{Auth::user()->avatar}}" width="140" height="140">
                <br>
              </div>
              <div align="center"><p>{{Auth::user()->name}}</p></div>
              <hr>
              <h5><strong>部门</strong></h5>
              <p>{{ Auth::user()->department->name }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="{{ route('reception.store') }}" method="POST" accept-charset="UTF-8">
          <h5>订接待餐：</h5>
          <hr>  
          <div class="row">
            <div class='col-sm-6'>
              <div class="form-group">
                <label>选择日期：</label>
                <!--指定 date标记-->
                <div class='input-group date' >
                  <input type='text' name='date' id='datetimepicker2' class="form-control" value="{{ $tomorrow }}"/>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>          
          <div class="row">
            <div class='col-sm-6'>
              <div class="form-group">
                <label>到</label>
                <!--指定 date标记-->
                <div class='input-group date' >
                  <input type='text' name='date' id='datetimepicker1' class="form-control" value="{{ $tomorrow }}"/>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label for="name">订餐餐厅：</label>
              <div class="form-group">
              <select class="form-control" id="canteen_select" name='canteen'>
                @foreach($canteens as $canteen)
                <option value="{{ $canteen->id }}">{{ $canteen->name }}</option>
                 @endforeach
              </select>
            </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-6">
              <label for="name">订餐餐别：</label>
             <div class="form-group">
              <div>
                <label class="checkbox-inline">
                  <input type="checkbox" id="bCheckbox" value="1" name='mckbox[]'> 早餐
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" id="lCheckbox" value="2" name='mckbox[]'> 午餐
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" id="sCheckbox" value="3" name='mckbox[]'> 晚餐
                </label>
              </div>
            </div>
          </div>
        </div>

          <div class="row">
             <div class="col-sm-6">
             <div class="form-group">
              <label for="std">用餐标准（元/人）：</label>
               <input type="text" class="form-control" id="std">

            </div>
          </div>
          </div>          
          <div class="row">
             <div class="col-sm-6">
             <div class="form-group">
              <label for="reason">接待事由：</label>
               <input type="textarea" class="form-control" id="reason">

            </div>
          </div>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <hr>
            <div id="spin"></div>
            <div class="form-group">
          
          </div>
        
          <button id='submit' type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>提交订餐
  </button>
</form>
        </div>
      </div>
      <hr>
      {{-- 用户发布的内容 --}}
      <div class="panel panel-default">
        <div class="panel-body">
          暂无数据 ~_~
        </div>
      </div>
    </div>
  </div>
  @stop