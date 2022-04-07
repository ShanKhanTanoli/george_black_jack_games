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
                                    <h3 class="card-label">Subscriptions</h3>
                                </div>
                                <div class="card-toolbar">
                                    <button data-toggle="modal" data-target="#createSubscription" class="btn btn-info">Create New Subscription</button>
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
                                @if($subscriptions->count() > 0)
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subscriber</th>
                                            <th scope="col">Game</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subscriptions as $subscription)
                                        <tr>
                                            <td>{{ User::find($subscription->user_id )->firstname }}</td>
                                            <td>
                                                {{ ucwords(Game::Info($subscription->game_id)->name) }}
                                            </td>
                                            <td>
                                                {{ $subscription->amount }} USD
                                            </td>
                                            <td>
                                                {{ $subscription->quantity }}
                                            </td>
                                            <td>
                                                @if($subscription->status == 1)
                                                <span class="badge badge-success">
                                                    Active
                                                </span>
                                                @else
                                                @if($subscription->stripe_status == "succeeded")
                                                <span class="badge badge-danger">
                                                    Expired
                                                </span>
                                                @else
                                                <span class="badge badge-danger">
                                                    {{ $subscription->stripe_status}}
                                                </span>
                                                @endif
                                                @endif
                                            </td>
                                            <td>{{ $subscription->created_at }}</td>
                                            @if($subscription->status == 1)
                                            <td><button data-toggle="modal" data-target="#SUB{{ $subscription->id }}" class="btn btn-success">
                                                    Edit
                                                </button>
                                            </td>
                                            @else
                                            <td><button data-toggle="modal" data-target="#SUB{{ $subscription->id }}" class="btn btn-primary">
                                                    View
                                                </button>
                                            </td>
                                            @endif
                                            <td>
                                                <form method="POST" action="{{ route('AdminDeleteSubscriptions', $subscription->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('Admin.pages.subscriptions.subscriptionModal')
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <table>
                                    <tr>
                                        <td>No data found</td>
                                    </tr>
                                </table>
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
            @include('Admin.pages.subscriptions.createSubscription')
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
