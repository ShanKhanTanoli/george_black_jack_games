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
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <h3 class="card-title">Card Details</h3>
                                    </div>
                                    <!--begin::Form-->
                                    <form class="form" method="POST" action="{{ route('StoreCards') }}">
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
                                                    <input type="text" class="form-control @error('cardName')is-invalid @enderror" placeholder="Enter Card Name" name="cardName">
                                                    @error('cardName')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Card Amount (USD):</label>
                                                    <input type="text" class="form-control @error('cardAmount')is-invalid @enderror" placeholder="Enter Card Amount" name="cardAmount">
                                                    @error('cardAmount')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Cards Quantity:</label>
                                                    <select class="form-control" id="cardQuantity" name="cardQuantity">
                                                        @for($i=1;$i<11;$i++) <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                    </select>
                                                    <small class="text-muted">Number of Cards To be created</small>
                                                    @error('cardQuantity')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label for="cardStatus">Card Status</label>
                                                    <select class="form-control" id="cardStatus" name="cardStatus">
                                                        <option value="available">Available</option>
                                                        <option value="recharged">Recharged</option>
                                                        <option value="expired">Expired</option>
                                                    </select>
                                                    @error('cardStatus')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="cardExpiry">Card Expiry</label>
                                                    <input class="form-control" type="date" name="cardExpiry" id="cardExpiry">
                                                    @error('cardExpiry')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="cardCreatedAt">Card Created At</label>
                                                    <input class="form-control" type="date" name="cardCreatedAt" id="cardCreatedAt">
                                                    @error('cardCreatedAt')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <button type="submit" class="btn btn-success mr-2">Create Now</button>
                                                </div>
                                            </div>
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
