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
                            <tr>
                                <td>1</td>
                                <td>2018-03-01</td>
                                <td>第一饭堂</td>
                                <td>早餐</td>
                                <td>瘦肉粥；油条；</td>
<!--                                 <td>是</td>
                                <td>13.80元</td>
                                <td>微信</td> -->
                                <td><button type="button" class="btn btn-xs btn-danger">撤销</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2018-05-02</td>
                                <td>第二饭堂</td>
                                <td>午餐</td>
                                <td>鱼腥草煲猪骨；通心菜；酿油炸；</td>
<!--                                 <td>是</td>
                                <td>13.80元</td>
                                <td>微信</td> -->
                                <td><button type="button" class="btn btn-xs btn-danger">撤销</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>2018-08-22</td>
                                <td>第三饭堂</td>
                                <td>晚餐</td>
                                <td>烧鸡腿；虾；胡椒猪肚；</td>
<!--                                 <td>是</td>
                                <td>13.80元</td>
                                <td>微信</td> -->
                                <td><button type="button" class="btn btn-xs btn-danger">撤销</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop