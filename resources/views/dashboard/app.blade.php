<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '报餐宝') - 轻松解决吃饭问题！</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="{{ route_class() }}-page">

        @include('dashboard._header')

        <div class="container">
            @include('layouts._message')
            @yield('content')

        </div>

        @include('dashboard._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    $(function () {
     
    // 控制列表活动状态
       $("li").each(function(index){
       $(this).click(function(){ 
       $("li").removeClass("active");
       $("li").eq(index).addClass("active");
       });
     });

  var chart = c3.generate({
    bindto: '#chart',
    data: {
      x: '报餐日期',
      columns: [
       ['报餐日期', '1.1', '2.5', '3.7', '4.8', '5.2', '8.23'],
        ['报餐人数', 30, 200, 100, 400, 150, 250],
      ]
    }
});


 });
    </script>
</body>
</html>