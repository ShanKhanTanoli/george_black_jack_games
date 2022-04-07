<nav id="nav-part" class="navbar header-nav other-nav custom_nav full_nav sticky-top navbar-expand-md hidden-main">
    <div class="container">
        @if(!is_null(Site::hasLogo()))
        <a href="{{ url('/') }}" class="navbar-brand">
            @if(Site::hasLogo()->siteLogo)
            <img lass="img-fluid logo-color" src="{{ asset('/images/site/'.Site::hasLogo()->siteLogo) }}" alt="{{ Site::hasLogo()->sitetitle }}">
            @else
            {{ Site::hasLogo()->sitetitle }}
            @endif
        </a>
        @endif
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="nav-res">
                <ul class="nav navbar-nav m-auto menu-inner fa-time">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('gallery') }}">Games</a></li>
                    @if(Auth::user())
                    <li> @if(Auth::user()->role_id == 1)
                        <a href="{{ route('AdminDashboard') }}" class="text-center">
                            Dashboard
                        </a>
                        @endif
                        @if(Auth::user()->role_id == 2)
                        <a href="{{ route('games') }}" class="text-center">
                            Dashboard
                        </a>
                        @endif
                        @if(Auth::user()->role_id == 3)
                        <a href="{{ route('CashierDashboard') }}" class="text-center">
                            Dashboard
                        </a>
                        @endif
                    </li>
                    @endif
                </ul>
            </div>
            @if(Auth::user())
            <ul class="login_menu navbar-right nav-sign">
                @if(Auth::user()->role_id == 2)
                <!--begin::User Card Balance-->
                <li class="casino-btn">
                    @if(Subscriber::GiftCardBalance() > 0)
                    <a href="{{ route('UserGiftCards') }}"><b>{{ Subscriber::GiftCardBalance() }}$</b></a>
                    @else
                    <a href="{{ route('UserGiftCards') }}">0<b>$</b></a>
                    @endif
                </li>
                <!--end::User Card Balance-->
                @endif
                <li class="casino-btn">
                    <a href="{{ route('logout') }}">Cashout</a>
                </li>
            </ul>
            @else
            <ul class="login_menu navbar-right nav-sign">
                <li class="login"><a href="{{ route('register') }}" class="btn-4 yellow-btn">Signup</a></li>
                <li class="login"><a href="{{ route('login') }}" class="btn-4 pink-bg">Login</a></li>
            </ul>
            @endif
        </div>
    </div>
</nav>
