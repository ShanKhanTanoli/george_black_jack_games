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
                            @include('Admin.partials.dashboard.settingsleftaside')
                            <!--end::Aside-->
                            <!--begin::Content-->
                            <div class="flex-row-fluid ml-lg-8">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    @if(Session::has('success'))
                                    <!--begin::Alert-->
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
                                    <!--end::Alert-->
                                    @endif
                                    <!--end::Header-->
                                    <!--begin::Form-->
                                    @if(!is_null(Site::HasLandingPage()))
                                    <form class="form" method="POST" action="{{ route('AdminSaveSiteAbout' , Site::HasLandingPage()->id) }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>About Title:</label>
                                                    <input type="text" name="about_heading" value="{!!Site::HasLandingPage()->about_heading !!}" class="form-control @error('about_heading')is-invalid @enderror" placeholder="Enter Heading for About Section">
                                                    @error('about_heading')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>About Description:</label>
                                                    <textarea name="about_description" class="form-control @error('about_description')is-invalid @enderror" placeholder="Enter Description for About Section">{!! Site::HasLandingPage()->about_description !!}</textarea>
                                                    @error('about_description')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <button type="submit" class="btn btn-success mr-2">Save Settings</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
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
@endsection
