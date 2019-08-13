<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="img/1559034957.ico">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <a href="index.php" class="brand"><img src="img/klothee-2.png"></a>  
        <div class="menu">
            <ul class="submenu">
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @endguest

                @auth
                    @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Author')
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @endif
                <li class="nav-item dropdown d-flex justify-content-center">
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
            <button class="nav-bar"><i class="fas fa-bars"></i></button>
        </div>
    </div>  
    
    <!-- Header Slide Mobile -->
    <div class="mobile-header">
        <div class="mobile-header-wrapper">
            <a class="text-center" href="index.php"><img class="img-fluid w-50" src="img/klothee-1-white.png"></a>
            <ul class="responsive-menu mt-5">
                <a href="index.php"><li><i class="fas fa-home pr-3"></i>Home</li></a>
                <a href="product.php"><li><i class="fa fa-tshirt pr-3"></i>Product</li></a>
                <a href="about.php"><li><i class="fas fa-user-friends pr-3"></i>About</li></a>
            </ul>
        </div>
    </div>
    
    @yield('content')

    <!-- Footer -->
    <div class="footer">
        <img src="img/klothee-1-white.png">
        <p>Copyright &copy; 2019 <a href="index.php" class="highlight">Klothee Inc.</a></p>
    </div>
</body>
</html>