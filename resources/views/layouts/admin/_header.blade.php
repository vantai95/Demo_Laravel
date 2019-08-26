<header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img class="navbar-brand-full" src="{{asset('/images/app/logo.png')}}" width="89" height="25" alt="CoreUI Logo">
            <img class="navbar-brand-minimized" src="{{asset('/images/app/favicon.ico')}}" width="30" height="30" alt="CoreUI Logo">
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
        </ul>

        <ul class="nav navbar-nav ml-auto mr-2">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">{{ Auth::user()->name }}
                    <img class="img-avatar" src="{{asset('/images/app/avatar.png')}}" alt="1">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ url('/admin/my-profile') }}">
                        <i class="fa fa-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" >
                        <i class="fa fa-lock"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </header>

    <script>
        
    </script>
