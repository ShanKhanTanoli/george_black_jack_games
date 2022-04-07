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
                        <!--begin::Card-->
                        @if($withdrawPage->count() >0)
                        @foreach($withdrawPage as $gamepage)
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <h3 class="card-title">WithDraw Information & Terms Conditions</h3>
                            </div>
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
                            <!--begin::Form-->
                            <form method="POST" action="{{ route('AdminSaveWithDraw' , $gamepage->id ) }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label>Page Title</label>
                                            <input type="text" name="pagetitle" value="{!! $gamepage->title !!}" class="form-control form-control @error('pagetitle') is-invalid @enderror" placeholder="Enter Page Title">
                                            <small class="text-muted">
                                                This is the Page Title
                                            </small>
                                            @error('pagetitle')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label>Minimum Limit to Withdraw</label>
                                            <input type="number" step="0.1" name="minLimit" value="{!! $gamepage->minLimit !!}" class="form-control form-control @error('minLimit') is-invalid @enderror" placeholder="Enter Page Title">
                                            <small class="text-danger">
                                                <strong>Set Minimum Amount for a Subscriber to Withdraw AMOUNT(1.0 = 1USD)</strong>
                                            </small>
                                            @error('minLimit')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12"><label>Game Information , Terms & Conditions</label>
                                            <textarea class="summernote @error('gameinfo') is-invalid @enderror" id="kt_summernote_1" name="gameinfo">{!! $gamepage->withdrawDescription !!}</textarea>
                                            @error('gameinfo')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-success mr-2">Save Terms and Information</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
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
<!--begin::Page Scripts(used by this page)-->
@section('scripts')
<script src="{{ asset('/dashboard/js/pages/crud/forms/editors/summernote.js') }}"></script>
@endsection
<!--end::Page Scripts-->
@endsection
