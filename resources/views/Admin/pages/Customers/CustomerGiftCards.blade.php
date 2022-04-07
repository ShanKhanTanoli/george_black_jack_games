@extends('layouts.master')
@section('content')
<!--begin::Main-->
<!--begin::Header Mobile-->
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
@endsection
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
                        <!--begin::Profile Personal Information-->
                        <div class="d-flex flex-row">
                            <!--begin::Aside-->
                            @include('Admin.partials.dashboard.subscriberprofileaside')
                            <!--end::Aside-->
                            <!--begin::Content-->
                            <div class="flex-row-fluid ml-lg-8">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header py-3">
                                        <div class="card-title align-items-start flex-column">
                                            <h3 class="card-label font-weight-bolder text-dark">Gift Cards</h3>
                                            <span class="text-muted font-weight-bold font-size-sm mt-1">Customer Cards History</span>
                                        </div>
                                    </div>

                                <!--begin::Errors-->
                                @include('errors.error')
                                <!--end::Errors-->
                                
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        @if(!is_null($vouchers))
                                        <!-- begin: DataTable-->
                                        <table id="CustomerGiftCards" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Detach</th>
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
                                                    <td>
                                                        <a href="{{ route('EditCard',$voucher->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('UserDetachGiftCard',$voucher->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">Detach</button>
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
                                    <!--end::Body-->
                                    <!--end::Form-->
                                </div>
                            </div>
                            <!--end::Content-->
                            <!--end::Content-->
                        </div>
                        <!--end::Profile Personal Information-->
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
@section('scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#CustomerGiftCards').DataTable();
});

</script>
<!--end::Page Scripts-->
@endsection
@endsection
