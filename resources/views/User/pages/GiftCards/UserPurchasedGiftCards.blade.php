@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{ asset('GiftCards/css/GiftCardStyle.css') }}">
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
                                    <span class="card-label font-weight-bolder text-dark">My Cards</span>
                                    <br>
                                </h3>
                            </div>
                            <div class="card-body">
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
                                <!--begin::Errors-->
                                @include('errors.error')
                                <!--end::Errors-->
                                @if(!is_null($vouchers))
                                <!-- begin: DataTable-->
                                <table id="giftCards" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">View/Print</th>
                                            <th scope="col">Cashout</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Recharge</th>
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
                                                @if($voucher->status == "CashOut")
                                                <span class="badge badge-info">
                                                    CashOut
                                                </span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ViewPrint{{$voucher->id}}Modal">View/Print
                                                </button>
                                                <!--begin::View/Print Modal-->
                                                @include('User.pages.GiftCards.partials.ViewPrintModal')
                                                <!--end::View/Print Modal-->
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Cashout{{$voucher->id}}Modal">Cashout
                                                </button>
                                            </td>
                                            <!--begin::Cashout Modal-->
                                            @include('User.pages.GiftCards.partials.CashoutModal')
                                            <!--end::Cashout Modal-->
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateCard{{$voucher->id}}Modal">Edit Card
                                                </button>
                                            </td>
                                            <!--begin::Edit Card Modal-->
                                            @include('User.pages.GiftCards.partials.UpdateCardModal')
                                            <!--end::Edit Card Modal-->
                                            <td>
                                                <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#RechargeGiftCard{{$voucher->id}}Modal">Recharge
                                                </button>
                                            </td>
                                            <!--begin::Recharge Modal-->
                                            @include('User.pages.GiftCards.partials.RechargeGiftCardModal')
                                            <!--end::Recharge Modal-->
                                            <td>
                                                @if(Card::IsConnected($voucher->code))
                                                <form method="POST" action="{{ route('UserDetachGiftCard',$voucher->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Detach
                                                    </button>
                                                </form>
                                                @else
                                                <form method="POST" action="{{ route('UserAddGiftCardById',$voucher->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Attach
                                                    </button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
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
