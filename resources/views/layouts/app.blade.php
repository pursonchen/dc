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
         } else {
               $("#breakfastlist").hide();
          }
      });   

      // 控制午餐别菜单隐藏显示
    $("#lCheckbox").click(function () {
          if ($(this).prop("checked")) {
               $("#lunchlist").show();
         } else {
               $("#lunchlist").hide();
          }
      });   

      // 控制晚餐别菜单隐藏显示
    $("#sCheckbox").click(function () {
          if ($(this).prop("checked")) {
               $("#supperlist").show();
         } else {
               $("#supperlist").hide();
          }
      });

    // 按钮弹窗
    $('#submit').click(function () {
$('.popover-show').popover('show');
    });
    
});

 
    </script>
</body>
</html>