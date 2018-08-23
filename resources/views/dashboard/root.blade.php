@extends('dashboard.app')
@section('title', '管理后台')
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
              <img class="img-circle" src="https://fsdhubcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/600/h/600" width="140" height="140">
              <br>
            </div>
            <div align="center"><p>管理员</p></div>
            <hr>
            <h5><strong>部门</strong></h5>
            <p>管理员</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body">
        
        <div class="alert alert-block alert-success">
          <button type="button" class="close" data-dismiss="alert">
          <i class="ace-icon fa fa-times"></i>
          </button>
          <i class="ace-icon fa fa-check green"></i>
          欢迎进入
          <strong class="green">
          报餐宝后台
          <small>(v1.4)</small>
          </strong>,
          这里可以对报餐人员、餐厅餐别、报餐报表进行设置和查看。
        </div>
      </div>
    </div>
 
 <div class="panel panel-default">
                    <div class="panel-heading">菜式欢迎程度</div>
                    <table class="table table-bordered">
                        <tbody><tr>
                            <td style="white-space:nowrap">猪腩肉</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width:3%"></div>
                                </div>
                            </td>
                            <td>3%</td>
                        </tr>
                        <tr>
                            <td style="white-space:nowrap">苦瓜炒牛肉</td>
                            <td style="width:100%">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" style="width:9%"></div>
                                </div>
                            </td>
                            <td>9%</td>
                        </tr>
                        <tr>
                            <td style="white-space:nowrap">蒸水蛋</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" style="width:12%"></div>
                                </div>
                            </td>
                            <td>12%</td>
                        </tr>
                        <tr>
                            <td style="white-space:nowrap">卤水猪脚</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" style="width:38%"></div>
                                </div>
                            </td>
                            <td>38%</td>
                        </tr>
                        <tr>
                            <td style="white-space:nowrap">咸鱼茄子</td>
                            <td style="width:100%">
                                <div class="progress">
                                    <div class="progress-bar" style="width:47%"></div>
                                </div>
                            </td>
                            <td>47%</td>
                        </tr>
                        <tr>
                            <td style="white-space:nowrap">卤水鸡中翅</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" style="width:73%"></div>
                                </div>
                            </td>
                            <td>73%</td>
                        </tr>
                    </tbody></table>
                </div>

<div class="panel panel-default">
                    <div class="panel-heading">2018年各月报餐人数</div>
                    <div class="panel-body">
                    <div id="chart" ></div>
                </div>
</div>
    {{-- 用户发布的内容 --}}
    <div class="panel panel-default">
      <div class="panel-body">
        暂无数据 ~_~
      </div>
    </div>
  </div>
</div>

@stop