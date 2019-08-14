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
        <aside class="sidebar bg-dark ">
            <div class="sidebar-menu">
                <a href="">Test Menu</a>
                <a href="">Test Menu</a>
                <a href="">Test Menu</a>
                <a href="">Test Menu</a>
            </div>
        </aside>
        <div class="main-wrapper">
            <!-- Header -->
            <div class="header">  
                <div class="menu">
                    <ul class="submenu">
                        @auth
                            @if (auth()->user()->role === 'Author')
                                <li><a href="">Management</a></li>
                            @endif
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li> 
                        @endauth
                    </ul>
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