<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/dashboard') }}">
                报餐宝管理后台
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul id='dashboardnav' class="nav navbar-nav">
                 <li id="dashboardHome" class="{{ active_class(if_route('dashboard')) }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                 <li id="dashboardHr" class="{{ active_class(if_route('dashboard')) }}"><a href="{{ route('dashboard') }}" class="{{ active_class(if_route('dashboard')) }}">人员管理</a></li>
                 <li id="dashboardMeal" class="{{ active_class(if_route('dashboard')) }}"><a href="{{ route('dashboard') }}" class="{{ active_class(if_route('dashboard')) }}">菜单管理</a></li>
                 <li id="dashboardTable" class="{{ active_class(if_route('dashboard')) }}"><a href="{{ route('dashboard') }}">报表中心</a></li>
                 <li id="dashboardSet" class="{{ active_class(if_route('dashboard')) }}"><a href="{{ route('dashboard') }}">系统设置</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">登录</a></li>
                    <li><a href="{{ route('register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                             <li>
                                <a href="{{ route('users.edit', Auth::id()) }}">
                                    编辑资料
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    退出登录
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>