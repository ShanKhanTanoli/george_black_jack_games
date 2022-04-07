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
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon svg-icon-xl">
                                            <i class="fas fa-info-circle text-danger"></i>
                                        </span>
                                    </div>
                                    <div class="alert-text">
                                        <strong class="text-danger">
                                            Amount will be Paid to Customer Stripe Connect Account.
                                        </strong>
                                    </div>
                                </div>
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
                                            {{ Session::get('error') }}
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <h3 class="card-title">Pay to Customer</h3>
                                    </div>
                                    <!--begin::Form-->
                                    <form method="POST" id="payment-form" action="{{ route('AdminPayToSubscriber' , $user->id ) }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Subscriber Email</label>
                                                <input type="hidden" value="{{ $withdrawId }}" name="withdrawId">
                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter email">
                                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="amount">Amount(USD)</label>
                                                <input type="number" step="0.1" name="amount" value="{{ $amount}}" class="form-control" placeholder="Amount">
                                                <small class="text-danger">
                                                    <strong>
                                                        Enter Amount in Numbers (1 , 2 etc ) You can use Decimal numbers also (0.1 , 0.01 etc )
                                                    </strong>
                                                </small>
                                            </div>
                                            <div class="form-group mb-1">
                                                <label for="reason">Reason(Optional ) </label>
                                                <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-dark">Make Payment</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card-->
                            </div>
                        </div>
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
