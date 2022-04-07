<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">2020©</span>
            @if(!is_null(Site::hasLogo()))
            @if(Site::hasLogo()->sitetitle)
            <a href="{{ route('AdminDashboard') }}" class="text-dark-75 text-hover-primary">{!! Site::hasLogo()->sitetitle !!}</a>
            @endif
            @else
            <a href="{{ route('AdminDashboard') }}" class="text-dark-75 text-hover-primary">{{ config('app.name', 'Laravel') }}</a>
            @endif
        </div>
        <!--end::Copyright-->
    </div>
    <!--end::Container-->
</div>
