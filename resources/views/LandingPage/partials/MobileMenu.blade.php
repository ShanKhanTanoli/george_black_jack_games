<nav id='cssmenu' class="hidden mobile">
    <div class="logo">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('LandingPage/images/header-logo.png') }}" class="img-responsive" alt="Logo">
        </a>
    </div>
    <div id="head-mobile"></div>
    <div class="button"><i class="more-less fa fa-align-right"></i></div>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('gallery') }}">Games</a></li>
        @if(Auth::user())
        <li class="login"> @if(Auth::user()->role_id == 1)
            <a class="btn-4 yellow-bg yellow-btn" href="{{ route('AdminDashboard') }}">
                Dashboard
            </a>
            @endif
            @if(Auth::user()->role_id == 2)
            <a class="btn-4 yellow-bg yellow-btn" href="{{ route('games') }}">
                Dashboard
            </a>
            @endif
            @if(Auth::user()->role_id == 3)
            <a class="btn-4 yellow-bg yellow-btn" href="{{ route('CashierDashboard') }}">
                Dashboard
            </a>
            @endif
        </li>
        <li class="login"><a class="btn-4 yellow-bg yellow-btn" href="{{ route('logout') }}">Cashout</a></li>
        @else
        <li class="login"><a href="{{ route('register') }}" class="btn-4 yellow-bg yellow-btn">Signup</a></li>
        <li class="login"><a href="{{ route('login') }}" class="btn-4 yellow-bg">Login</a></li>
        @endif
    </ul>
</nav>
