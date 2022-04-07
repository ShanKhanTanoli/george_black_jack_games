@extends('layouts.master')
@section('style')
<!--begin::Page Custom Styles(used by this page)-->
<link href="{{ asset('dashboard/css/pages/error/error-5.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Custom Styles-->
@endsection
@section('content')
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Error-->
    <div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({{ asset('dashboard/media/error/bg5.jpg') }});">
        <!--begin::Content-->
        <div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
            <h1 class="error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12">Oops!</h1>
            <p class="font-weight-boldest display-4">Something went wrong here.Login in to Continue</p>
            <p class="font-size-h3">
                <a href="{{ url()->previous() }}" class="btn btn-info">Go Back</a>
                <a href="{{ route('login') }}" class="btn btn-danger">Login</a>
            </p>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Error-->
</div>
@endsection
