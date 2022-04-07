@extends('layouts.master')
@section('content')
<!--begin::Main-->
<!--begin::Header Mobile-->
@if(Auth::user()->role_id == 1)
@include('Admin.partials.dashboard.headermobile')
@else
@include('User.partials.dashboard.headermobile')
@endif
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        @if(Auth::user()->role_id == 1)
        @include('Admin.partials.dashboard.leftSideNav')
        @else
        @include('User.partials.dashboard.leftSideNav')
        @endif
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            @if(Auth::user()->role_id == 1)
            @include('Admin.partials.dashboard.header')
            @else
            @include('User.partials.dashboard.header')
            @endif
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                @if(Auth::user()->role_id == 1)
                @include('Admin.partials.dashboard.SubHeader')
                @else
                @include('User.partials.dashboard.SubHeader')
                @endif
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <span class="card-icon">
                                        <i class="flaticon2-chart text-primary"></i>
                                    </span>
                                    <h3 class="card-label">Games</h3>
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
                                    <!--begin::Games Loop-->
                                    @if(Game::All()->count() > 0)
                                    @foreach(Game::All() as $game)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!--begin::Games Grid-->
                                        <div class="card card-custom card-stretch gutter-b">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <!--begin::All Games Grid-->
                                                @include('game.partials.grid')
                                                <!--end::All Games Grid-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Games Grid-->
                                    </div>
                                    @endforeach
                                    @endif
                                    <!--end::Games loop-->
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            @if(Auth::user()->role_id == 1)
            @include('Admin.partials.dashboard.footer')
            @else
            @include('User.partials.dashboard.footer')
            @endif
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
@if(Auth::user()->role_id == 1)
@include('Admin.partials.dashboard.userpanel')
@else
@include('User.partials.dashboard.userpanel')
@endif
<!-- end::User Panel-->
<!--begin::Quick Cart-->
<!--end::Quick Cart-->
<!--begin::Quick Panel-->
<!--end::Quick Panel-->
<!--begin::Chat Panel-->
<!--end::Chat Panel-->
<!--begin::Scrolltop-->
@if(Auth::user()->role_id == 1)
@include('Admin.partials.dashboard.scrolltotop')
@else
@include('User.partials.dashboard.scrolltotop')
@endif
<!--end::Scrolltop-->
<!--begin::Sticky Toolbar-->
<!--end::Sticky Toolbar-->
<!--begin::Demo Panel-->
<!--end::Demo Panel-->
@endsection
