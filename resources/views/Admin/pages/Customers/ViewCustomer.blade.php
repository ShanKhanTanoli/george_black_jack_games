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
                        <!--begin::Profile Personal Information-->
                        <div class="d-flex flex-row">
                            <!--begin::Aside-->
                            @include('Admin.partials.dashboard.subscriberprofileaside')
                            <!--end::Aside-->
                            <!--begin::Content-->
                            <!--begin::Content-->
                            <div class="flex-row-fluid ml-lg-8">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header py-3">
                                        <div class="card-title align-items-start flex-column">
                                            <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                                            <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                                        </div>
                                    </div>
                                    @if(Session::has('message'))
                                    <!--begin::Alert-->
                                    <div class="alert alert-custom alert-light-success fade show mb-10" role="alert">
                                        <div class="alert-icon">
                                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                                <i class="flaticon2-check-mark text-success"></i>
                                            </span>
                                        </div>
                                        <div class="alert-text font-weight-bold">
                                            {{ Session::get('message') }}
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="ki ki-close"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <!--end::Alert-->
                                    @endif
                                    <!--end::Header-->
                                    <!--begin::Form-->
                                    @include('Admin.pages.Customers.partials.updateSubcriberForm')
                                    <!--end::Form-->
                                </div>
                            </div>
                            <!--end::Content-->
                            <!--end::Content-->
                        </div>
                        <!--end::Profile Personal Information-->
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
@section('scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
<!--end::Page Scripts-->
@endsection
@endsection
