@extends('layouts.master')
@section('content')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
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
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Add Or Delete Gift Cards</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('CreateCards') }}" class="btn btn-info font-weight-bolder font-size-sm mr-3">Add New Gift Cards</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin::Errors-->
                                @include('errors.error')
                                <!--end::Errors-->
                                
                                @if(!is_null($vouchers))
                                <!-- begin: DataTable-->
                                <table id="giftCards" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Recharge Count</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Created</th>
                                            <th scope="col">Cashed At</th>
                                            <th scope="col">Expiry</th>
                                            <th scope="col">Recharge</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vouchers as $voucher)
                                        <tr>
                                            <td>{!! $voucher->name !!}</td>
                                            <td>{!! $voucher->recharge_count !!}</td>
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

                                                @if($voucher->status == "CashOut")
                                                <span class="badge badge-info">
                                                    CashOut
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
                                            @if(!is_null($voucher->created_at))
                                            <td>{{ date('d-M-Y',strtotime($voucher->created_at) ) }}</td>
                                            @else
                                            <td>-----</td>
                                            @endif

                                            @if(!is_null($voucher->cashout_at))
                                            <td>{{ date('d-M-Y',strtotime($voucher->cashout_at) ) }}</td>
                                            @else
                                            <td>-----</td>
                                            @endif

                                            @if(!is_null($voucher->expires_at))
                                            <td>{{ date('d-M-Y',strtotime($voucher->expires_at) ) }}</td>
                                            @else
                                            <td>-----</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('RechargeCard',$voucher->id) }}" class="btn btn-info btn-sm">Recharge</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('EditCard',$voucher->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('DeleteVoucher',$voucher->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <!--end: DataTable-->
                                <div class="alert alert-danger">
                                    No Gift Cards Found
                                </div>
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {

    $('#giftCards').DataTable();
});

</script>
@endsection
<!--end::Page Scripts-->
@endsection
