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
          @include('common.error')
          <form action="{{ route('orders.store') }}" method="POST" accept-charset="UTF-8">
          <h5>开始订餐：</h5>
          <hr>  
          <div class="row">
            <div class='col-sm-6'>
              <div class="form-group">
                <label>选择用餐日期：</label>
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
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <hr>
            <div id="spin"></div>
            <div class="form-group">
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
  @section('javascript')
 <script>
const BREAKFAST_MEAL_ID = 1;
const LUNCH_MEAL_ID = 2;
const SUPPER_MEAL_ID =3;
var breakfastLoaded = false;
var lunchLoaded = false;
var supperLoaded = false;
var target = document.getElementById('spin');

  //当日期和餐厅改变时无法加载  
$(function () {
    // 初始化日期控件
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: moment.locale('zh-cn')
    }).on('dp.change', function(e){
          // 当日期改变，自动移除早餐菜单
          resetList();
    });   

     $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: moment.locale('zh-cn')
    }).on('dp.change', function(e){
          // 当日期改变，自动移除早餐菜单
          resetList();
    });

    // 监听canteen_select 的变化
    $("#canteen_select").change(function(event) {
          
           resetList();
    });

   // 控制早餐别菜单隐藏显示
    $("#bCheckbox").click(function () {
          if ($(this).prop("checked")) {
            $("#breakfastlist").show();
            
            // ajax获取菜单
            if(!breakfastLoaded)
            {

              meal_ajax($("#datetimepicker1").val(),$("#canteen_select").val(),BREAKFAST_MEAL_ID);
            }

         } else {
               $("#breakfastlist").hide();
          }
      });   

      // 控制午餐别菜单隐藏显示
    $("#lCheckbox").click(function () {
          if ($(this).prop("checked")) {
               $("#lunchlist").show();
          if(!lunchLoaded)
          {
            meal_ajax($("#datetimepicker1").val(),$("#canteen_select").val(),LUNCH_MEAL_ID);
          }

         } else {
               $("#lunchlist").hide();
          }
      });   

      // 控制晚餐别菜单隐藏显示
    $("#sCheckbox").click(function () {
          if ($(this).prop("checked")) {
               $("#supperlist").show();
               if(!supperLoaded)
               {

               meal_ajax($("#datetimepicker1").val(),$("#canteen_select").val(),SUPPER_MEAL_ID);
               }

         } else {
               $("#supperlist").hide();
          }
      });


});

// 监听变化后，清空list
function resetList()
{
          $('#bListItem').find('span').remove();
          $("#breakfastlist").hide();
          $("#bCheckbox").prop("checked",false);
          breakfastLoaded =false;

          $('#lListItem').find('span').remove();
          $("#lunchlist").hide();
          $("#lCheckbox").prop("checked",false);
          lunchLoaded =false;

          $('#sListItem').find('span').remove();
          $("#supperlist").hide();
          $("#sCheckbox").prop("checked",false);
          supperLoaded =false;
}
        
     
// ajax 获取菜单
function meal_ajax(date, canteen_id, meal_id)
{
  $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/getdish',
                    data: {'date':date ,'canteen_id':canteen_id, 'meal_id':meal_id},
                    dataType: 'json',
                    async : 'false',    //同步
                    beforeSend: function () {

                    
                    spinner.spin(target);//显示加载
                },
                    success: function(data){
                          console.log(data);
                      
                          switch(meal_id)
                        {
                          case 1:
                              for(var i = 0; i < data.length; i++){
                                $('#bListItem').append( ' <span class="list-group-item">'+data[i].name+data[i].price+' 元/'+data[i].unit+'<input type="checkbox" id="bCheckbox'+i+'" name="listItems[]" value="'+data[i].id+'"></span>' );
                              } 
                              breakfastLoaded = true;
                          break;
                          case 2:
                               for(var i = 0; i < data.length; i++){
                                $('#lListItem').append( ' <span class="list-group-item">'+data[i].name+data[i].price+' 元/'+data[i].unit+'<input type="checkbox" id="lCheckbox'+i+'" name="listItems[]" value="'+data[i].id+'"></span>' );
                              } 
                              lunchLoaded = true;
                          break;
                          case 3:
                              for(var i = 0; i < data.length; i++){
                                $('#sListItem').append( ' <span class="list-group-item">'+data[i].name+data[i].price+' 元/'+data[i].unit+'<input type="checkbox" id="sCheckbox'+i+'" name="listItems[]" value="'+data[i].id+'"></span>' );
                              } 
                              supperLoaded = true;
                          }
                        },
                       error:function(data){
                        console.log(data);
                       },
                        complete: function () {
                              spinner.spin();//移除加载
                }
                });
}

// 初始化表格固定列
// $(function(){
//         $.fn.TableLock({table:'lockTable',lockRow:1,lockColumn:2,width:'100%',height:'300px'});
//     });
 
    </script>
  @stop