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
                                    @if(!is_null(Site::hasLogo()))
                                    <form class="form" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                @if(isset(Site::hasLogo()->siteLogo))
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="image-input image-input-outline" id="kt_image_1">
                                                        <div class="image-input-wrapper" style="background-image: url('{{ asset('/images/site/'.Site::hasLogo()->siteLogo)  }}');"></div>
                                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                                            <input type="hidden" name="profile_avatar_remove" value="0">
                                                        </label>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                    <button formaction="{{ route('AdminRemoveSiteLogo' , Site::hasLogo()->id ) }}" type="submit" class="btn btn-danger btn-sm mt-2">Remove Image</button>
                                                </div>
                                                @else
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="image-input image-input-outline" id="kt_image_1">
                                                        <div class="image-input-wrapper" style="background-image: url('{{ asset('/images/defaut.jpg')  }}');"></div>
                                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                                            <input type="hidden" name="profile_avatar_remove" value="0">
                                                        </label>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <button formaction="{{ route('AdminSaveSiteLogo', Site::hasLogo()->id ) }}" type="submit" class="btn btn-success mr-2">Upload Logo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                    <!--end::Form-->
                                </div>
                            </div>
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
<script src="{{ asset('/dashboard/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
<!--end::Page Scripts-->
@endsection
@endsection
