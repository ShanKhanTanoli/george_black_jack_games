@extends('layouts.master')
@section('content')
@section('style')
<style type="text/css">
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
/*.StripeElement {
    width: 100%;
    box-sizing: border-box;

    height: 40px;

    padding: 10px 12px;

    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
}*/
.StripeElement {
    display: block;
    width: 100%;
    height: calc(1.5em + 1.3rem + 2px);
    padding: 0.65rem 1rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #3F4254;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #E4E6EF;
    border-radius: 0.42rem;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}

.StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
    border-color: #fa755a;
}

.StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
}

</style>
@endsection
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
                    <div class="container bg-white">
                        <div class="col-xl-10 m-auto">
                            <div class="py-5 text-center">
                                <h2>Checkout</h2>
                            </div>
                            @if(Session('success'))
                            <div class="col-xxl-12 m-auto mt-2">
                                <div class="alert alert-custom alert-success fade show" role="alert">
                                    <div class="alert-text">
                                        {{ Session::get('success') }}
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(Session('error'))
                            <div class="col-xxl-12 m-auto mt-2">
                                <div class="alert alert-custom alert-danger fade show" role="alert">
                                    <div class="alert-text">
                                        <strong>
                                            {{ Session::get('error') }}
                                        </strong>
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-4 order-md-2 mb-4">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Your cart</span>
                                        <!-- <span class="badge badge-secondary badge-pill">3</span> -->
                                    </h4>
                                    <ul class="list-group mb-3">
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">Game Name</h6>
                                            </div>
                                            <strong>{{ $game->name }}</strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">Coin Price</h6>
                                            </div>
                                            <strong>$ {{ $coinPrice }} USD</strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">Quantity</h6>
                                            </div>
                                            <strong>{{ $quantity }}</strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">Total ({{ $coinPrice }}X{{ $quantity }}) </h6>
                                            </div>
                                            <strong>$ {{ $totalPrice }} USD</strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8 order-md-1">
                                    <h4 class="mb-3">Billing Details</h4>
                                    <form action="{{ route('ChargeCustomer') }}" method="post" id="payment-form">
                                        @csrf
                                        <input type="hidden" name="priceId" value="{{ $price_id }}">
                                        <input type="hidden" name="quantity" value="{{ $quantity }}">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">First name</label>
                                                <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Your First Name" value="{{ Auth::user()->firstname}}" disabled="disabled" required="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName">Last name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Enter last Name" value="{{ Auth::user()->lastname}}" disabled="disabled" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ Auth::user()->email }}" disabled="disabled" required="required">
                                        </div>
                                        <h4 class="mb-3">Payment</h4>
                                        <!--begin::Card Payment-->
                                        @if(!is_null($paymentMethods))
                                        <div class="mb-3">
                                            <label for="country">Select Payment Methods</label>
                                            <select class="custom-select d-block w-100" name="paymentMethod" id="paymentMethod" required="">
                                                @foreach($paymentMethods as $paymentMethod)
                                                <option value="{{ $paymentMethod->payment_method }}">{{ strtoupper($paymentMethod->brand."-".$paymentMethod->country) }}{{ " Exp ".$paymentMethod->exp_month."/".$paymentMethod->exp_year." **** **** ****".$paymentMethod->last4 }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @else
                                        <div class="mb-3">
                                            <label for="card-element">
                                                Credit or debit card
                                            </label>
                                            <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                        @endif
                                        <!--end::Card Payment-->
                                        <button class="btn btn-dark btn-lg btn-block" id="paymentButton" type="submit"><i class="fab fa-2x text-white fa-stripe"></i>
                                            Pay Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
@if(is_null($paymentMethods))
@section('scripts')
<script>
$(document).ready(function() {


    // Create a Stripe client.
    var stripe = Stripe('{{ Site::Stripe()->stripe_publishable }}');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', { style: style });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

});

</script>
@endsection
@else
@section('scripts')
<script>
$(document).ready(function() {
    $("#payment-form").submit(function() {
        $("#paymentButton").attr('disabled', true);
    });
});

</script>
@endsection
@endif
@endsection
