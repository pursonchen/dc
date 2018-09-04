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
           @if (if_route('root') || if_route('reception') || if_route('login'))
           @else
           <div id="backbutton">
                <span class="glyphicon glyphicon-chevron-left  ">返回</span>
            </div>
            @endif
            @include('layouts._message')
            @yield('content')

        </div>

        @include('layouts._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    $("#backbutton").click(function(){
   
      window.location.href = document.referrer;
   });
    </script>
     @yield('javascript')
</body>
</html>