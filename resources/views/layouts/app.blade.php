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
 
    </script>
</body>
</html>