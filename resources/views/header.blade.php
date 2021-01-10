<!-- Logo -->
<a href="{{url('/')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>API Test</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        @auth
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle">
                    <span class="hidden-xs">{{auth()->user()->email}}</span>
                </a>
            </li>
            <li class="dropdown user user-menu">
                <a href="{{url('logout')}}" class="dropdown-toggle">
                    <span class="hidden-xs">Log Out</span>
                </a>
            </li>
        @endauth

        @guest
            <li class="dropdown user user-menu">
                <a href="{{url('login')}}" class="dropdown-toggle">
                    <span class="hidden-xs">Log In</span>
                </a>
            </li>
        @endguest
        
    </ul>
    </div>
</nav>