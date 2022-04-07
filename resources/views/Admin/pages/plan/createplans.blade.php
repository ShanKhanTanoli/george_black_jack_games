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
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10">
                        <div class="card card-custom gutter-b ">
                            <div class="card-header">
                                <h3 class="card-title">Create Plans & Pricing</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="POST" action="{{ route('AdminStorePlan') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Plan Name:</label>
                                        <input type="text" name="planName" value="{{ old('planName') }}" class="form-control form-control-solid @error('planName') is-invalid @enderror" placeholder="Enter Plan Name">
                                        @error('planName')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Short Description:</label>
                                        <textarea class="form-control form-control-solid @error('planShortDescription') is-invalid @enderror" name="planShortDescription" value="{{ old('planShortDescription') }}" cols="30" rows="5"></textarea>
                                        @error('planShortDescription')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Long Description:</label>
                                        <textarea class="form-control form-control-solid @error('planLongDescription') is-invalid @enderror" name="planLongDescription" value="{{ old('planLongDescription') }}" cols="30" rows="5"></textarea>
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
                                            <input type="number" step="0.01" name="planPrice" value="{{ old('planPrice') }}" class="form-control form-control-solid @error('planPrice') is-invalid @enderror" placeholder="99.9" />
                                            @error('planPrice')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Number of Game Plays</label>
                                        <input type="number" name="gameplay" class="form-control form-control-solid @error('gameplay') is-invalid @enderror" placeholder="Enter Number">
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
                                        <input type="text" value="Buy Now" name="planText" value="{{ old('planText') }}" class="form-control form-control-solid @error('planText') is-invalid @enderror" placeholder="Enter Button Text">
                                        @error('planText')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Create Plan</button>
                                </div>
                            </form>
                            <!--end::Form-->
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
