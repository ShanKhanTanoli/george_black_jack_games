@extends('layouts.master')
@section('content')
<!--begin::Main-->
<!--begin::Header Mobile-->
@include('Admin.partials.dashboard.headermobile')
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        @include('Admin.partials.dashboard.leftSideNav')
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            @include('Admin.partials.dashboard.header')
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                @include('Admin.partials.dashboard.SubHeader')
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--Begin::Row-->
                        <div class="row">
                            <!--************************-->
                            <!--************************-->
                            <!--************************-->
                            <div class="col-xl-6">
                                <!--begin::Stats Widget 13-->
                                <a href="{{ route('AdminSubscibers') }}" class="card card-custom bg-dark bg-hover-state-dark card-stretch gutter-b">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                            <i class="fas fa-user fa-3x text-white"></i>
                                        </span>
                                        <div class="text-inverse-dark font-weight-bolder font-size-h5 mb-2 mt-5">Total Customers</div>
                                        <div class="font-weight-bold text-inverse-dark font-size-sm">{{ $totalUser }}
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Stats Widget 13-->
                            </div>
                            <!--************************-->
                            <!--************************-->
                            <!--************************-->
                            <div class="col-xl-6">
                                <!--begin::Stats Widget 18-->
                                <a href="{{ route('games') }}" class="card card-custom bg-dark bg-hover-state-dark card-stretch gutter-b">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                            <i class="fas fa-dice fa-3x text-white"></i>
                                        </span>
                                        <div class="text-inverse-dark font-weight-bolder font-size-h5 mb-2 mt-5">Total Games</div>
                                        <div class="font-weight-bold text-inverse-dark font-size-sm">{{ Game::All()->count() }}</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Stats Widget 18-->
                            </div>
                            <!--************************-->
                            <!--************************-->
                            <!--************************-->
                            <div class="col-xl-6">
                                <!--begin::Stats Widget 18-->
                                <div class="card card-custom bg-dark bg-hover-state-dark card-stretch gutter-b">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                            <i class="fas fa-wallet fa-3x text-white"></i>
                                        </span>
                                        <div class="text-inverse-dark font-weight-bolder font-size-h5 mb-2 mt-5">Total Money In</div>
                                        <div class="font-weight-bold text-inverse-dark font-size-sm">{{ Site::TotalCheckouts() }} USD</div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Stats Widget 18-->
                            </div>
                            <!--************************-->
                            <!--************************-->
                            <!--************************-->
                            <div class="col-xl-6">
                                <!--begin::Stats Widget 18-->
                                <div class="card card-custom bg-dark bg-hover-state-dark card-stretch gutter-b">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                            <i class="fas fa-money-check-alt fa-3x text-white"></i>
                                        </span>
                                        <div class="text-inverse-dark font-weight-bolder font-size-h5 mb-2 mt-5">Total Money Out</div>
                                        <div class="font-weight-bold text-inverse-dark font-size-sm">{{ Site::TotalPayouts() }} USD</div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Stats Widget 18-->
                            </div>
                            <!--************************-->
                            <!--************************-->
                            <!--************************-->
                        </div>
                        <!-- End::Row-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            @include('Admin.partials.dashboard.footer')
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
@include('Admin.partials.dashboard.userpanel')
<!-- end::User Panel-->
<!--begin::Quick Cart-->
<!--end::Quick Cart-->
<!--begin::Quick Panel-->
<!--end::Quick Panel-->
<!--begin::Chat Panel-->
<!--end::Chat Panel-->
<!--begin::Scrolltop-->
@include('Admin.partials.dashboard.scrolltotop')
<!--end::Scrolltop-->
<!--begin::Sticky Toolbar-->
<!--end::Sticky Toolbar-->
<!--begin::Demo Panel-->
<!--end::Demo Panel-->
@endsection
