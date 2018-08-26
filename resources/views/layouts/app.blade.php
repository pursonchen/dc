<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '报餐宝') - {{ setting('site_name', '轻松解决吃饭问题！') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description', ''))" />
    <meta name="keyword" content="@yield('keyword', setting('seo_keyword', ''))" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header')

        <div class="container">
            @include('layouts._message')
            @yield('content')

        </div>

        @include('layouts._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
const BREAKFAST_MEAL_ID = 1;
const LUNCH_MEAL_ID = 2;
const SUPPER_MEAL_ID =3;
var breakfastLoaded = false;
var lunchLoaded = false;
var supperLoaded = false;
  //当日期和餐厅改变时无法加载 需要加个spin动画  
$(function () {
    // 初始化日期控件
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: moment.locale('zh-cn')
    });

   // 控制早餐别菜单隐藏显示
    $("#bCheckbox").click(function () {
          if ($(this).prop("checked")) {
            $("#breakfastlist").show();
            
            // ajax获取菜单
            if(!breakfastLoaded)
            {

              meal_ajax($("#datetimepicker").val(),$("#canteen_select").val(),BREAKFAST_MEAL_ID);
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
            meal_ajax($("#datetimepicker").val(),$("#canteen_select").val(),LUNCH_MEAL_ID);
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

               meal_ajax($("#datetimepicker").val(),$("#canteen_select").val(),SUPPER_MEAL_ID);
               }

         } else {
               $("#supperlist").hide();
          }
      });

   


    // 按钮弹窗  
$('#submit').click(function () {
$('.popover-show').popover('show');
    });
});

// 监听日期变化，清空list
 // $('#datetimepicker1').bind('input propertychange', function() {
 //        $('#bListItem').html($(this).val().length + ' characters');
 //    });

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
                    success: function(data){
                          console.log(data);
                      
                          switch(meal_id)
                        {
                          case 1:
                              for(var i = 0; i < data.length; i++){
                                $('#bListItem').append( ' <span class="list-group-item">'+data[i].name+'<input type="checkbox" id="bCheckbox'+i+'" value="'+data[i].id+'"></span>' );
                              } 
                              breakfastLoaded = true;
                          break;
                          case 2:
                               for(var i = 0; i < data.length; i++){
                                $('#lListItem').append( ' <span class="list-group-item">'+data[i].name+'<input type="checkbox" id="lCheckbox'+i+'" value="'+data[i].id+'"></span>' );
                              } 
                              lunchLoaded = true;
                          break;
                          case 3:
                              for(var i = 0; i < data.length; i++){
                                $('#sListItem').append( ' <span class="list-group-item">'+data[i].name+'<input type="checkbox" id="sCheckbox'+i+'" value="'+data[i].id+'"></span>' );
                              } 
                              supperLoaded = true;
                          }
                        },
                       error:function(data){
                        console.log(data);
                       }
                });
}
 
    </script>
}
</body>
</html>