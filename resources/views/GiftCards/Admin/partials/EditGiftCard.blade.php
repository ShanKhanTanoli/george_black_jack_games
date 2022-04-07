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
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <h3 class="card-title">Card Details</h3>
                                    </div>
                                    <!--begin::Form-->
                                    <form class="form" method="POST" action="{{ route('UpdateCard',$voucher->id) }}">
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
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label>Card Name:</label>
                                                    <input type="text" class="form-control @error('cardName')is-invalid @enderror" placeholder="Enter Card Name" name="cardName" value="{!! $voucher->name !!}">
                                                    @error('cardName')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Card Amount (USD):</label>
                                                    <input type="text" class="form-control @error('cardAmount')is-invalid @enderror" placeholder="Enter Card Amount" name="cardAmount" value="{!! $voucher->price !!}">
                                                    @error('cardAmount')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Recharge Count:</label>
                                                    <input type="number" class="form-control @error('rechargeCount')is-invalid @enderror" placeholder="Enter Recharge Count" name="rechargeCount" value="{!! $voucher->recharge_count !!}">
                                                    <small class="text-muted">Card Recharged Number of times</small>
                                                    @error('rechargeCount')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                    <label for="cardStatus">Card Status</label>
                                                    <select class="form-control" id="cardStatus" name="cardStatus">

                                                        @if($voucher->status == "available")
                                                        <option selected="selected" value="available">Available</option>
                                                        <option value="CashOut">
                                                            CashOut</option>
                                                        <option value="recharged">Recharged</option>
                                                        <option value="expired">Expired</option>
                                                        @endif

                                                        @if($voucher->status == "redeemed")
                                                        <option selected="selected" value="redeemed">Redeemed</option>
                                                        <option value="CashOut">
                                                            CashOut</option>
                                                        <option value="available">Available</option>
                                                        <option value="expired">Expired</option>
                                                        <option value="recharged">Recharged</option>
                                                        @endif

                                                        @if($voucher->status == "recharged")
                                                        <option selected="selected" value="recharged">
                                                            Recharged</option>
                                                        <option value="CashOut">
                                                            CashOut</option>
                                                        <option value="available">Available</option>
                                                        <option value="expired">Expired</option>
                                                        @endif

                                                        @if($voucher->status == "CashOut")
                                                        <option selected="selected" value="CashOut">
                                                            CashOut</option>
                                                        <option value="recharged">
                                                            Recharged</option>
                                                        <option value="available">Available</option>
                                                        <option value="expired">Expired</option>
                                                        @endif

                                                        @if($voucher->status == "expired")
                                                        <option selected="selected" value="expired">Expired</option>
                                                        <option value="available">Available</option>
                                                        <option value="recharged">Recharged</option>
                                                        @endif

                                                    </select>
                                                    @error('cardStatus')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="cardExpiry">Card Expiry</label>
                                                    @if(!is_null($voucher->expires_at))
                                                    <input class="form-control" type="date" value="{{ $voucher->expires_at->format('Y-m-d') }}" name="cardExpiry" id="cardExpiry">
                                                    @error('cardExpiry')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                    @else
                                                    <input class="form-control" type="date" value="" name="cardExpiry" id="cardExpiry">
                                                    @error('cardExpiry')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                    @endif
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="cardCreatedAt">Card Created At</label>
                                                    <input class="form-control" type="date" value="{{ $voucher->created_at->format('Y-m-d') }}" name="cardCreatedAt" id="cardCreatedAt">
                                                    @error('cardCreatedAt')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                @if(!is_null($voucher->cashout_at))
                                                <div class="col-lg-3">
                                                    <label for="cashout_at">Card Cashed Out At</label>
                                                    <input class="form-control" type="date" value="{{ date('Y-m-d',strtotime($voucher->cashout_at)) }}" name="cashout_at" id="cashout_at">
                                                    @error('cashout_at')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                @else
                                                <div class="col-lg-3">
                                                    <label for="cashout_at">Card Cashed Out At</label>
                                                    <input class="form-control" type="date" name="cashout_at" id="cashout_at">
                                                    @error('cashout_at')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewCardModal">View Card</button>
                                                    <a href="{{ route('RechargeCard',$voucher->id) }}" class="btn btn-primary">Recharge</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card-->
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
