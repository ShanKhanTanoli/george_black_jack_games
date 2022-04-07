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
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <div class="card-title">
                                    <span class="card-icon">
                                        <i class="flaticon-users-1 text-primary"></i>
                                    </span>
                                    <h3 class="card-label">Current Customer(s) of the Card.
                                    <strong class="text-danger">
                                        Customer can not be more than One at the same time.
                                    </strong>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin::Errors-->
                                @include('errors.error')
                                <!--end::Errors-->

                                <!--begin: Datatable-->
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#ID</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Detach</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Block</th>
                                            <th scope="col">Permanent delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $users)
                                        @if($users->role_id == 2)
                                        <tr>
                                            <th scope="row">{{ $users->id }}</th>
                                            <td>{!! $users->firstname !!}</td>
                                            <td>{!! $users->lastname !!}</td>
                                            <td>{!! $users->email !!}</td>

                                            @if( $users->trashed())
                                            <td><span class="badge badge-danger">Blocked</span></td>
                                            @else
                                            <td><span class="badge badge-success">Active</span></td>
                                            @endif

                                            <td>
                                                <form method="POST" action="{{ route('UserDetachGiftCard',$voucher->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Detach
                                                    </button>
                                                </form>
                                            </td>

                                            <td><a href="{{ route('AdminViewSubscibers',$users->id) }}" class="btn btn-primary btn-sm">View</a></td>

                                            @if($users->role_id == 2)
                                            @if($users->trashed())
                                            <td>
                                                <form action="{{ route('AdminRestoreSubscriber', $users->id)}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                                </form>
                                            </td>
                                            @else
                                            <td>
                                                <form action="{{ route('AdminBlockSubscriber', $users->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Block</button>
                                                </form>
                                            </td>
                                            @endif
                                            <td>
                                                <form action="{{ route('AdminDeletePermanent', $users->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete Permanently</button>
                                                </form>
                                            </td>
                                            @else
                                            <td>
                                                <button class="btn btn-danger btn-sm disabled">Block</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm disabled">Delete Permanently</button>
                                            </td>
                                            @endif
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable-->
                                <hr />
                                <h3 class="card-label">
                                    Card Information     
                                </h3>
                                <h3>
                                     @if($voucher->status == "CashOut")
                                    <strong class="text-danger">This Card was Cashed Out</strong>
                                    @endif
                                </h3>
                                <!--begin: Datatable-->
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Current Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Cashed Out At</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Cashout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $voucher->id }}</th>
                                            <td>{!! $voucher->name !!}</td>
                                            <td>{!! $voucher->code !!}</td>
                                            <td><strong>{!! $voucher->price !!} USD</strong></td>
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
                                                @if(!is_null($voucher->cashout_at))
                                            <td>{{ date('d-M-Y',strtotime($voucher->cashout_at) ) }}</td>
                                            @else
                                            <td>-----</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('EditCard',$voucher->id) }}" class="btn btn-primary btn-sm">View</a>
                                            </td>
                                            <td>
                                             @if($voucher->status !== "CashOut")
                                                <form action="{{ route('CashedOut',$voucher->code)}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Cashout</button>
                                                </form>
                                            @else
                                            <button type="button" disabled="disabled" class="btn btn-success btn-sm">Cashout</button>
                                            @endif
                                            </td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                                <!--end: Datatable-->

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
@section('scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});

</script>
<!--end::Page Scripts-->
@endsection
@endsection
