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
          <h5>开始订餐：</h5>
          <hr>  
          <div class="row">
            <div class='col-sm-6'>
              <div class="form-group">
                <label>选择日期：</label>
                <!--指定 date标记-->
                <div class='input-group date' >
                  <input type='text' id='datetimepicker' class="form-control" value="{{ $tomorrow }}"/>
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
              <select class="form-control" id="canteen_select">
                @foreach($canteens as $canteen)
                <option value="{{ $canteen->id }}">{{ $canteen->name }}</option>
                 @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-6">
              <label for="name">订餐餐别：</label>
              <div>
                <label class="checkbox-inline">
                  <input type="checkbox" id="bCheckbox" value="option1"> 早餐
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" id="lCheckbox" value="option2"> 午餐
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" id="sCheckbox" value="option3"> 晚餐
                </label>
              </div>
            </div>
          </div>
          <br>
          <hr>
            <div id="spin"></div>
          <div class="row">
            <div id="breakfastlist" class="col-sm-4" style="display: none;">
              <div class="list-group" id="bListItem">
                <a href="#" class="list-group-item active" >
                  早餐菜式
                </a>
 
              </div>
            </div>
            <div id="lunchlist" class="col-sm-4" style="display: none;">
              <div class="list-group" id="lListItem">
                <a href="#" class="list-group-item active" >
                  午餐菜式
                </a>
 
              </div>
            </div>
            <div id="supperlist" class="col-sm-4" style="display: none;">
              <div class="list-group" id="sListItem">
                <a href="#" class="list-group-item active" >
                  晚餐菜式
                </a>
 
              </div>
            </div>
          </div>
          <button id='submit' type="button" class="btn btn-primary popover-show" 
      title="通知" data-container="body" 
      data-toggle="popover" 
      data-content="恭喜您，订餐成功！">
    提交订餐
  </button>
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