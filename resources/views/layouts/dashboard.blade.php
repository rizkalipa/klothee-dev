<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="icon" href="img/1559034957.ico">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>
    {{-- Dashboard With Sidebar --}}
    <div class="wrapper d-flex">
        {{-- Sidebar Menu --}}
        <aside class="sidebar bg-dark">
            <div class="sidebar-brand text-center pt-4">
                <img src="{{ asset('img/klothee-1-white.png') }}" class="img-fluid w-75 p-1">
            </div>
            <div class="sidebar-menu mt-5">
                <a href=""><i class="fas fa-clipboard-check h5"></i>Meet Scheduler</a>
                <a href=""><i class="far fa-calendar-alt h5"></i><p>Events</p></a>
                <a href=""><i class="fas fa-envelope h5"></i><p>Community Mail</p></a>
                <a href=""><i class="fas fa-user-friends h5"></i><p>Member Manager</p></a>
            </div>
        </aside>
        <div class="main-wrapper">
            <!-- Header -->
            <div class="header">  
                <div class="menu">
                    <ul class="submenu">
                        @auth
                        <li><span class="highlight h5"><i class="fas fa-bell"></i></span></li>
                        <li class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-right border-0 shadow text-center" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="">
                                    {{ 'Setting' }}
                                </a>
                                @if (auth()->user()->role === 'Author')
                                    <a href="" class="dropdown-item">Management</a>
                                 @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li> 
                        @endauth
                    </ul>
                </div>
                <div class="sub-header shadow bg-primary">  
                    <h5 class="m-0">Admin Dashboard</h5>
                </div>  
            </div>
              

        @yield('content')
        </div>
    </div>

    {{-- <div class="footer">
        <img src="img/klothee-1-white.png">
        <p>Copyright &copy; 2019 <a href="index.php" class="highlight">Klothee Inc.</a></p>
    </div> --}}
</body>
</html>