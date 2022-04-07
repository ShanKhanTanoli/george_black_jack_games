@extends('layouts.master')
@section('content')
@section('style')
<link rel="stylesheet" href="{{ asset('GiftCards/css/GiftCardStyle.css') }}">
@endsection
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
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="card card-custom ">
                                    <div class="card-header">
                                        <h3 class="card-title">Recharge Card</h3>
                                    </div>
                                    <!--begin::Form-->
                                    <form class="form" method="POST" action="{{ route('CardRecharged',$voucher->id) }}">
                                        @csrf
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
                                            <!--begin::Card Status-->
                                            @include('GiftCards.Admin.partials.GiftCardStatus')
                                            <!--end::Card Status-->
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Card Number:</label>
                                                        <input type="text" class="form-control" placeholder="Card Number" name="code" value="{!! $voucher->code!!}">
                                                        <span class="form-text text-muted">Please enter Card Number</span>
                                                        @error('code')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Amount/Balance:</label>
                                                        <input type="number" class="form-control" placeholder="Enter Amount" name="cardAmount" value="{{ $voucher->price }}">
                                                        <span class="form-text text-muted">Please enter Amount(USD)</span>
                                                        @error('cardAmount')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-lg-4"></div>
                                                    <div class="col-lg-8">
                                                        <button type="submit" class="btn btn-success mr-2">Process Transaction</button>
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewCardModal">View Card</button>
                                                        <a href="{{ route('EditCard',$voucher->id) }}" class="btn btn-primary mr-2">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                        </div>
                        <!--begin::View Gift Card-->
                        @include('GiftCards.Admin.partials.ViewGiftCard')
                        <!--begin::View Gift Card-->
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
