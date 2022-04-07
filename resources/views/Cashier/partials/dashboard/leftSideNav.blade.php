<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        @if(!is_null(Site::hasLogo()))
        <a href="{{ route('CashierDashboard') }}" class="brand-logo">
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
                    <a href="{{ route('CashierDashboard') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-cash-register text-primary"></i>
                        </span>
                        <span class="menu-text">Cashout</span>
                    </a>
                </li>
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ url('/') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-globe text-primary"></i>
                        </span>
                        <span class="menu-text">Home</span>
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
