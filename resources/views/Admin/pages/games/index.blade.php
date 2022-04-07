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
            @include('User.partials.dashboard.header')
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
                        <!--begin::Card-->
                        @if(Game::All()->count() > 0)
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <span class="card-icon">
                                        <i class="flaticon2-chart text-primary"></i>
                                    </span>
                                    <h3 class="card-label">Our Games & Pricing</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session('success'))
                                <div class="col-xxl-12 m-auto mt-2">
                                    <div class="alert alert-custom alert-success fade show" role="alert">
                                        <div class="alert-text">
                                            {{ Session::get('success') }}
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(Session('error'))
                                <div class="col-xxl-12 m-auto mt-2">
                                    <div class="alert alert-custom alert-danger fade show" role="alert">
                                        <div class="alert-text">
                                            <strong>
                                                {{ Session::get('error') }}
                                            </strong>
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row justify-content-center my-20">
                                    <!--begin: Pricing-->
                                    @foreach(Game::All() as $game)
                                    <!--begin::Buy Plan-->
                                    @include('Admin.pages.games.partials.games')
                                    <!--end::Buy Plan-->
                                    @endforeach
                                    <!--end: Pricing-->
                                </div>
                            </div>
                        </div>
                        @endif
                        <!--end::Card-->
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
