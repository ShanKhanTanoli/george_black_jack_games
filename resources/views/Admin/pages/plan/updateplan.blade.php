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
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-xxl-6">
                            <div class="card card-custom gutter-b ">
                                <div class="card-header">
                                    <h3 class="card-title">Update Plan & Pricing</h3>
                                </div>
                                <!--begin::Form-->
                                <form class="form" method="POST" action="{{ route('AdminUpdatePlan',$plan->id) }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Plan Name:</label>
                                            <input type="text" name="planName" value="{!! $plan->name !!}" class="form-control form-control-solid @error('planName') is-invalid @enderror" placeholder="Enter Plan Name">
                                            @error('planName')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Short Description:</label>
                                            <textarea class="form-control form-control-solid @error('planShortDescription') is-invalid @enderror" name="planShortDescription" value="{{ old('planShortDescription') }}" cols="30" rows="5">{!! $plan->shortdescription !!}</textarea>
                                            @error('planShortDescription')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Long Description:</label>
                                            <textarea class="form-control form-control-solid @error('planLongDescription') is-invalid @enderror" name="planLongDescription" value="{{ old('planLongDescription') }}" cols="30" rows="5">{!! $plan->shortdescription !!}</textarea>
                                            @error('planLongDescription')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" step="0.01" name="planPrice" value="{!! $plan->price !!}" class="form-control form-control-solid @error('planPrice') is-invalid @enderror" placeholder="99.9" />
                                                @error('planPrice')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Number of Game Plays</label>
                                            <input type="number" name="gameplay" class="form-control form-control-solid @error('gameplay') is-invalid @enderror" value="{!! $plan->numberofgameplays !!}" placeholder="Enter Number">
                                            @error('gameplay')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        @if($game->count() > 0)
                                        <div class="form-group">
                                            <label>Select Game</label>
                                            <select name="selectGame" class="form-control form-control-solid">
                                                @foreach($game as $games)
                                                <option value="{{ $games->id}}">{!! $games->name!!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Button Text</label>
                                            <input type="text" name="planText" value="{!! $plan->buttontext !!}" class="form-control form-control-solid @error('planText') is-invalid @enderror" placeholder="Enter Button Text">
                                            @error('planText')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success mr-2">Update Plan</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-6">
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
                            <div class="card card-custom">
                                <div class="card-body">
                                    <div class="row justify-content-center text-center my-0 my-md-25">
                                        <!-- begin: Pricing-->
                                        <div class=" bg-white rounded-right shadow-sm">
                                            <div class="pt-25 pb-25 pb-md-10 px-4">
                                                <h4 class="mb-15">{!! $plan->name !!}</h4>
                                                <span class="px-7 py-3 d-inline-flex flex-center rounded-lg mb-15 bg-primary-o-10">
                                                    <span class="pr-2 opacity-70">$</span>
                                                    <span class="pr-2 font-size-h1 font-weight-bold">{!! $plan->price !!}</span>
                                                    <span class="opacity-70">&nbsp;&nbsp;USD</span>
                                                </span>
                                                <br>
                                                <span class="px-7 py-3 d-inline-flex flex-center rounded-lg mb-15 bg-primary-o-10">
                                                    <span class="pr-2 font-size-h4 font-weight-bold">{!! $plan->numberofgameplays !!}
                                                    </span>
                                                    <span class="opacity-70">&nbsp;&nbsp;Time(s) Game Play</span>
                                                </span>
                                                <br>
                                                <p class="mb-10 d-flex flex-column text-dark-50">
                                                    <span>{!! $plan->shortdescription !!}</span>
                                                    <span>{!! $plan->longdescription !!}</span>
                                                </p>
                                                <button type="button" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">{!! $plan->buttontext !!}</button>
                                            </div>
                                        </div>
                                        <!-- end: Pricing-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
