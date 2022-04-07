@extends('layouts.master')
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
                                    <span class="card-label font-weight-bolder text-dark">My Accounts</span>
                                    <br>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('UserPurchasedCards') }}" class="btn btn-info font-weight-bolder font-size-sm mr-3">My Cards</a>
                                    <button type="button" class="btn btn-info font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#AddPaypalAccountModal">Add New Account</button>
                                </div>
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
                                            You Must Add Paypal Account in Order to Cashout the Money.Please Be Careful While Adding Paypal Accounts.
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
                                @if($accounts = Subscriber::PaypalAccounts(Auth::user()->id))
                                <!-- begin: DataTable-->
                                <table id="giftCards" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Paypal Accounts</th>
                                            <th scope="col">Edit Account</th>
                                            <th scope="col">Delete Account</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($accounts as $account)
                                        <tr>
                                            <td>{!! $account->paypal_id !!}</td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#EditPaypalAccount{{$account->id}}Modal">Edit Account
                                                </button>
                                            </td>
                                            <!--begin::Edit Paypal Account Modal-->
                                            @include('User.pages.Paypal.partials.EditPaypalAccountModal')
                                            <!--end::Edit Paypal Account Modal-->
                                            <td>
                                                <form method="POST" action="{{ route('DeletePaypalAccount',$account->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete Account
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
                        <!--begin::Add New Paypal Account Modal-->
                        @include('User.pages.Paypal.partials.AddPaypalAccountModal')
                        <!--end::Add New Paypal Account Modal-->
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
