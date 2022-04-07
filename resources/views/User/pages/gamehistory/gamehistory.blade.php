@extends('layouts.master')
@section('content')
<!--begin::Main-->
<!--begin::Header Mobile-->
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
@endsection
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
                            <div class="card-header">
                                <div class="card-title">
                                    <span class="card-icon">
                                        <i class="fas fa-tasks text-primary"></i>
                                    </span>
                                    <h3 class="card-label">Your Game History</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin: Search Form-->
                                <!--begin: Datatable-->
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
                                @if($history->count() > 0)
                                <!-- begin: Pricing-->
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Game Name</th>
                                            <th scope="col">Got Numbers</th>
                                            <th scope="col">Winning Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Played At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $userhistory)
                                        <tr>
                                            <td>{{ Game::Info($userhistory->GameId)->name }}</td>
                                            <td>{{ $userhistory->gotNumbers }}</td>
                                            <td>{{ $userhistory->WinningAmount }} USD</td>
                                            @if($userhistory->status > 0)
                                            <td>
                                                <span class="badge badge-success">
                                                    Won
                                                </span>
                                            </td>
                                            @else
                                            <td>
                                                <span class="badge badge-danger">
                                                    Loss
                                                </span>
                                            </td>
                                            @endif
                                            <td>{{ $userhistory->created_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- end: Pricing-->
                                @else
                                <div class="alert alert-danger">
                                    No History Found!
                                </div>
                                @endif
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
<!--begin::Quick Cart-->
<!--end::Quick Cart-->
<!--begin::Quick Panel-->
<!--end::Quick Panel-->
<!--begin::Chat Panel-->
<!--end::Chat Panel-->
<!--begin::Scrolltop-->
@include('User.partials.dashboard.scrolltotop')
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
