@extends('layouts.master')
@section('content')
<!--begin::Main-->
<!--begin::Header Mobile-->
@include('Cashier.partials.dashboard.headermobile')
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        @include('Cashier.partials.dashboard.leftSideNav')
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            @include('Cashier.partials.dashboard.header')
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                @include('Cashier.partials.dashboard.SubHeader')
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Cashout</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <!--begin::Errors-->
                                @include('errors.error')
                                <!--end::Errors-->
                                <!--begin::Form-->
                                <form action="{{ route('CashierCheckCard') }}">
                                    <div class="row d-flex">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Enter GiftCard Number" name="code" value="{{ old('code') }}" required />
                                                <span class="form-text text-muted">Enter the Gift Card Number by Using Dashes e.g 3333-3333-3333-3333.</span>
                                                @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success" data-dismiss="modal">Check Card</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--begin::Form-->
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
            @include('Cashier.partials.dashboard.footer')
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
@include('Cashier.partials.dashboard.userpanel')
<!-- end::User Panel-->
<!--begin::Scrolltop-->
@include('Cashier.partials.dashboard.scrolltotop')
<!--end::Scrolltop-->
@endsection
