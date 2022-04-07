<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        @if(!is_null(Site::hasLogo()))
        <a href="{{ route('AdminDashboard') }}" class="brand-logo">
            @if(Site::hasLogo()->siteLogo)
            <div style="width: 80px;">
                <img style="width: 100%; height: 100%;" src="{{ asset('/images/site/'.Site::hasLogo()->siteLogo) }}" alt="{{ Site::hasLogo()->sitetitle }}">
            </div>
            @else
            {{ Site::hasLogo()->sitetitle }}
            @endif
        </a>
        @endif
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon-->
                <i class="fas fa-arrow-left"></i>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('AdminDashboard') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="flaticon2-architecture-and-city text-primary"></i>
                        </span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('Cashout') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-cash-register text-primary"></i>
                        </span>
                        <span class="menu-text">Cashout</span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('ViewCards') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-credit-card text-primary"></i>
                        </span>
                        <span class="menu-text">Gift Cards
                            <span class="menu-label">
                                <span class="label label-danger label-inline">{{ \BeyondCode\Vouchers\Models\Voucher::count() }}</span>
                            </span>
                        </span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('CreateCards') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-credit-card text-primary"></i>
                        </span>
                        <span class="menu-text">Create Gift Cards</span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('AdminSubscibers') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="flaticon-users-1 text-primary"></i>
                        </span>
                        <span class="menu-text">Customers <span class="menu-label">
                                <span class="label label-danger label-inline">{{ \App\User::where('role_id',2)->count() }}</span>
                            </span></span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('games') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-dice text-primary"></i>
                        </span>
                        <span class="menu-text">Games <span class="menu-label">
                                <span class="label label-danger label-inline">{{ Game::All()->count() }}
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('AdminProfile') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-user text-primary"></i>
                        </span>
                        <span class="menu-text">Profile</span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('AdminSettings') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-tools text-primary"></i>
                        </span>
                        <span class="menu-text">Settings</span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ url('/') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-globe text-primary"></i>
                        </span>
                        <span class="menu-text">Visit Site</span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ route('logout') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-sign-out-alt text-primary"></i>
                        </span>
                        <span class="menu-text">Log Out</span>
                    </a>
                </li>
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->
