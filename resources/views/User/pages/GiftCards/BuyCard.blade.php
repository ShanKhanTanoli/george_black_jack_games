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
                                    <span class="card-label font-weight-bolder text-dark">Buy Gift Card</span>
                                    <br>
                                    <span class="text-muted small">Add (If you already have) or Buy a Gift Card in order to play Game</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('UserGiftCards') }}" class="btn btn-success font-weight-bolder font-size-sm mr-3">Add Gift Card</a>
                                </div>
                            </div>
                            <div class="card-body d-flex">
                                <!--begin::Errors-->
                                @include('errors.error')
                                <!--end::Errors-->
                                <!--begin::Col-->
                                <div class="col-sm-12 col-lg-6">
                                    <div id="printContent">
                                        <style type="text/css">
                                        @media print {

                                            body * {
                                                visibility: hidden;
                                            }

                                            #printContent * {
                                                visibility: visible;
                                                overflow: visible;
                                            }

                                        </style>
                                        <!--begin::Card-->
                                        <div class="card GiftCard">
                                            <!--begin::Gift Card-->
                                            <div class="front">
                                                <img src="{{ asset('GiftCards/images/card.png') }}" alt="" class="card_img center">
                                                <div class="card-content text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="353px" height="206px" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <text x="5" y="20" style="font-size:16;fill:#FFF;">
                                                            Name </text>
                                                        <text x="210" y="20" style="font-size:16;fill:#FFF;">
                                                            123-456-789-011 </text>
                                                        <text x="5" y="105" style="font-size:16;fill:#FFF;">
                                                        </text>
                                                        <!--begin::Bar Code-->
                                                        <div class="bar-code">
                                                            <?php echo QrCode::color(0, 0, 0)->backgroundColor(255, 255, 255,100)->encoding('UTF-8')->generate(123-456-789-011);?>
                                                        </div>
                                                        <!--end::Bar Code-->
                                                    </svg>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="back">
                                                <img src="{{ asset('GiftCards/images/card2.png') }}" alt="" class="card_img">
                                                <div class="card-content">
                                                    <div class="middle text-center" style="font-size:40px;color:#fff;">
                                                        @if(!is_null(Site::hasLogo()))
                                                        @if(Site::hasLogo()->siteLogo)
                                                        <div style="width: 80px; margin: 0 auto ;">
                                                            <img style="width: 100%; height: 100%;" src="{{ asset('/images/site/'.Site::hasLogo()->siteLogo) }}" alt="{{ Site::hasLogo()->sitetitle }}">
                                                        </div>
                                                        @else
                                                        {{ Site::hasLogo()->sitetitle }}
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <!--end::Gift Card-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                @if(Site::PaypalCredentials())
                                <!--begin::Col-->
                                <div class="col-sm-12 col-lg-6">
                                    <h3 class="card-title  flex-column text-center mb-5">
                                        <span class="card-label font-weight-bolder text-dark">Buy Gift Card</span>
                                        <br>
                                        <span class="text-muted small">Add (If you already have) or Buy a Gift Card in order to play Game</span>
                                    </h3>
                                    <div class="form-group col-sm-12">
                                        <input class="form-control @error('amount') is-invalid @enderror" type="text" placeholder="Enter Amount" name="amount" id="amount" autocomplete required />
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div id="paypal-button-container"></div>
                                    </div>
                                </div>
                                <!--end::Col-->
                                @endif
                            </div>
                        </div>
                        <!--end::Card-->
                        <!--begin::Add New Card Modal-->
                        @include('User.pages.GiftCards.partials.AddNewGiftCardModal')
                        <!--end::Add New Card Modal-->
                    </div>
                    <!--end::Container-->
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
    @endsection
