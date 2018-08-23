  @extends('layouts.app')
  @section('title', '报餐宝')
  @section('content')
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 user-info">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="media">
            <h5><strong>欢迎你！</strong></h5>
            <p>当前时间：2018-8-21 星期二</p>
            <div class="media-body">
              <hr>
              <div align="center">
                <img class="img-circle" src="https://lccdn.phphub.org/uploads/avatars/1_1530614766.png?imageView2/1/w/200/h/200" width="140" height="140">
                <br>
              </div>
              <div align="center"><p>测试用户</p></div>
              <hr>
              <h5><strong>部门</strong></h5>
              <p>人力资源部</p>
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
                <div class='input-group date' id='datetimepicker1'>
                  <input type='text' class="form-control" />
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
              <select class="form-control">
                <option>第一食堂</option>
                <option>第二食堂</option>
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
                  <input type="checkbox" id="lCheckbox" value="option2"  checked="checked"> 午餐
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" id="sCheckbox" value="option3"> 晚餐
                </label>
              </div>
            </div>
          </div>
          <br>
          <hr>
          <div class="row">
            <div id="breakfastlist" class="col-sm-4" style="display: none;">
              <div class="list-group">
                <a href="#" class="list-group-item active" >
                  早餐菜式
                </a>
                <span class="list-group-item">白粥<input type="checkbox" id="bCheckbox1" value="bCheckbox1"></span>
                <span class="list-group-item">油条<input type="checkbox" id="bCheckbox2" value="bCheckbox1"></span>
                <span class="list-group-item">豆浆<input type="checkbox" id="bCheckbox3" value="bCheckbox1"></span>
                <span class="list-group-item">炒粉<input type="checkbox" id="bCheckbox4" value="bCheckbox1"></span>
              </div>
            </div>
            <div id="lunchlist" class="col-sm-4">
              <div class="list-group">
                <a href="#" class="list-group-item active">
                  午餐菜式
                </a>
                <span class="list-group-item">清蒸鲮鱼<input type="checkbox" id="lCheckbox1" value="lCheckbox1"></span>
                <span class="list-group-item">鱼香茄子<input type="checkbox" id="lCheckbox1" value="lCheckbox1"></span>
                <span class="list-group-item">通心菜<input type="checkbox" id="lCheckbox1" value="lCheckbox1"></span>
                <span class="list-group-item">菜干煲猪骨<input type="checkbox" id="lCheckbox1" value="lCheckbox1"></span>
              </div>
            </div>
            <div id="supperlist" class="col-sm-4" style="display: none;">
              <div class="list-group" >
                <a href="#" class="list-group-item active" >
                  晚餐菜式
                </a>
                <span href="#" class="list-group-item">酿豆腐<input type="checkbox" id="sCheckbox1" value="sCheckbox1"></span>
                <span href="#" class="list-group-item">东坡肉<input type="checkbox" id="sCheckbox1" value="sCheckbox1"></span>
                <span href="#" class="list-group-item">卤水鸡翼<input type="checkbox" id="sCheckbox1" value="sCheckbox1"></span>
                <span href="#" class="list-group-item">清补凉<input type="checkbox" id="sCheckbox1" value="sCheckbox1"></span>
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