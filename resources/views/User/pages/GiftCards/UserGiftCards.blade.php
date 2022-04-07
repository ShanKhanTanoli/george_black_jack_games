@extends('layouts.master')
@section('head-scripts')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
@endsection
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
                        <div class="card card-custom">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Add Gift Card</span>
                                    <br>
                                    <span class="text-muted small">Add or Buy a Gift Card in order to play Game</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('UserPurchasedCards') }}" class="btn btn-info font-weight-bolder font-size-sm mr-3">My Cards</a>
                                    <button type="button" class="btn btn-success font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#BuyNewGiftCardModal">Buy Gift Card</button>
                                    <button type="button" id="StartCamera" class="btn btn-info font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#AddNewGiftCardModal">Add New Gift Card</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--****************************-->
                                <!--****************************-->
                                <!--****************************-->
                                <!--begin::Attached Cards-->
                                @if(Card::CountAllConnected(Auth::user()->id) > 1)
                                <div class="alert alert-custom alert-light-danger fade show mb-10 mt-2 mb-2" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger">
                                            <i class="fas fa-exclamation text-danger"></i>
                                        </span>
                                    </div>
                                    <div class="alert-text font-weight-bold">
                                        <strong>
                                            You have attached {{ Card::CountAllConnected(Auth::user()->id) }} Cards at once.You can not use Multiple Cards at once.Only Attach one Card in Order to use and Play Game.If you can't Detach the Card then Contact Support.
                                        </strong>
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
                                <!--end::Attached Cards-->
                                <!--****************************-->
                                <!--****************************-->
                                <!--****************************-->
                                <!--begin::Info for Attaching Card-->
                                <div class="alert alert-custom alert-light-dark fade show mb-10 mt-2 mb-2" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-3x svg-icon-dark">
                                            <i class="fas fa-info text-dark"></i>
                                        </span>
                                    </div>
                                    <div class="alert-text font-weight-bold">
                                        <strong>
                                            You can not Attach Multiple Cards at Once.Detach the card then try to Attach another Card.
                                        </strong>
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="ki ki-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <!--begin::Info for Attaching Card-->
                                <!--****************************-->
                                <!--****************************-->
                                <!--****************************-->
                                <!--begin::Errors-->
                                @include('errors.error')
                                <!--end::Errors-->
                                <!--****************************-->
                                <!--****************************-->
                                <!--****************************-->
                                @if(!is_null($vouchers))
                                <!-- begin: DataTable-->
                                <table id="giftCards" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Redeemed At</th>
                                            <th scope="col">Expiry</th>
                                            <th scope="col">Detach Card</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vouchers as $voucher)
                                        <tr>
                                            <td>{!! $voucher->name !!}</td>
                                            <td>{!! $voucher->code !!}</td>
                                            <td>{{ $voucher->price }} USD</td>
                                            <td>
                                                @if($voucher->status == "available")
                                                <span class="badge badge-success">
                                                    Available
                                                </span>
                                                @endif
                                                @if($voucher->status == "recharged")
                                                <span class="badge badge-info">
                                                    Recharged
                                                </span>
                                                @endif
                                                @if($voucher->status == "redeemed")
                                                <span class="badge badge-danger">
                                                    Redeemed
                                                </span>
                                                @endif
                                                @if($voucher->status == "expired")
                                                <span class="badge badge-danger">
                                                    Expired
                                                </span>
                                                @endif
                                            </td>
                                            @if(!is_null($voucher->pivot->redeemed_at))
                                            <td>{{ date('d-M-Y',strtotime($voucher->pivot->redeemed_at) ) }}</td>
                                            @else
                                            <td>-----</td>
                                            @endif
                                            @if(!is_null($voucher->expires_at))
                                            <td>{{ date('d-M-Y',strtotime($voucher->expires_at) ) }}</td>
                                            @else
                                            <td>-----</td>
                                            @endif
                                            <td>
                                                <form method="POST" action="{{ route('UserDetachGiftCard',$voucher->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Detach
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                        <!--end::Card-->
                        <!--begin::Add New Card Modal-->
                        @include('User.pages.GiftCards.partials.AddNewGiftCardModal')
                        <!--end::Add New Card Modal-->
                        <!--begin::Buy New Card Modal-->
                        @include('User.pages.GiftCards.partials.BuyNewGiftCardModal')
                        <!--end::Buy New Card Modal-->
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
<!--begin::Scrolltop-->
@include('User.partials.dashboard.scrolltotop')
<!--end::Scrolltop-->
<!--**************-->
<!--**************-->
<!--**************-->
@endsection
