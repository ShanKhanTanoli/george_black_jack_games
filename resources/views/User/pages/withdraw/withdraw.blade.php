@extends('layouts.master')
@section('content')
<!--begin::Main-->
<!--begin::Header Mobile-->
@include('User.partials.dashboard.headermobile')
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        @include('User.partials.dashboard.leftSideNav')
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            @include('User.partials.dashboard.header')
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                @include('User.partials.dashboard.SubHeader')
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Card-->
                        @if($withDrawTerms->count() > 0)
                        @foreach($withDrawTerms as $withdraw)
                        <div class="card card-custom gutter-b ">
                            <div class="card-header">
                                <h3 class="card-title">{!! $withdraw->title !!}</h3>
                            </div>
                            <div class="card-body">
                                @if(Session('success'))
                                <div class="alert alert-custom alert-light-success fade show mb-10" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-3x svg-icon-success">
                                            <i class="flaticon2-check-mark text-success"></i>
                                        </span>
                                    </div>
                                    <div class="alert-text font-weight-bold">
                                        {{ Session::get('success') }}
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="ki ki-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                                @if(Session('error'))
                                <div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger">
                                            <i class="flaticon2-check-mark text-danger"></i>
                                        </span>
                                    </div>
                                    <div class="alert-text font-weight-bold">
                                        {{ Session::get('error') }}
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="ki ki-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                                @if($errors->any())
                                @foreach($errors->all() as $error)
                                <div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger">
                                            <i class="flaticon2-check-mark text-danger"></i>
                                        </span>
                                    </div>
                                    <div class="alert-text font-weight-bold">
                                        {{ $error }}
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="ki ki-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        {!! $withdraw->withdrawDescription !!}
                                    </div>
                                </div>
                                <hr>
                                @include('User.pages.withdraw.requestWithdrawForm')
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!--end::Card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            @include('User.partials.dashboard.footer')
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
@include('User.partials.dashboard.userpanel')
<!-- end::User Panel-->
<!--begin::Quick Cart-->
<!--end::Quick Cart-->
<!--begin::Quick Panel-->
<!--end::Quick Panel-->
<!--begin::Chat Panel-->
<!--end::Chat Panel-->
<!--begin::Scrolltop-->
@include('User.partials.dashboard.scrolltotop')
<!--end::Scrolltop-->
<!--begin::Sticky Toolbar-->
<!--end::Sticky Toolbar-->
<!--begin::Demo Panel-->
<!--end::Demo Panel-->
@endsection
