<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Mobile Toggle-->
            @if(Request::path() == "admin/profile" OR Request::path() == "admin/password" OR Request::path() == "admin/Settings" OR Request::path() == "admin/Sitelogo" OR request()->is("GameDescription*") OR
            request()->is("GamePrice*") OR request()->is("ConfigureGame*") OR request()->is("SetGameWinningNumbers*") OR request()->is("GamePicture*") OR request()->is("GameBackgroundPicture*")
            OR request()->is("admin/ViewCustomer*") OR request()->is("admin/ViewCustomerPassword*") OR request()->is("admin/CustomerGameHistory*") OR request()->is("admin/CustomerSubscriptionHistory*") OR request()->is("admin/CustomerWithdrawHistory*") )
            <!--begin::Mobile Toggle-->
            <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                <span></span>
            </button>
            <!--end::Mobile Toggle-->
            @endif
            <!--end::Mobile Toggle-->
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <!-- <h5 class="text-dark font-weight-bold my-1 mr-5">{{ strtoupper(Request::path()) }}</h5> -->
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <!--end::Toolbar-->
    </div>
</div>
