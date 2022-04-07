<!-- The Modal -->
<div class="modal fade" id="RechargeGiftCard{{ $voucher->id}}Modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body bg-transparent">
                <!--begin::Card-->
                <div class="card card-custom bg-transparent">
                    <div class="card-body d-flex bg-transparent">
                        @if(Site::PaypalCredentials())
                        <!--begin::Col-->
                        <div class="col-sm-12 col-lg-12">
                            <h3 class="card-title  flex-column text-center mb-5">
                                <span class="card-label font-weight-bolder text-dark">Recharge</span>
                                <br>
                                <span class="text-muted small">Enter Amount to Recharge your Card</span>
                            </h3>
                            <form method="POST" action="{{ route('PaypalCardRecharge',$voucher->id) }}">
                                @csrf
                                <div class="form-group col-sm-12">
                                    <input class="form-control @error('amount') is-invalid @enderror" type="text" placeholder="Enter Amount" name="amount" id="amount" value="{{ old('amount') }}" autocomplete required />
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-info btn-lg btn-block">
                                        <strong>Pay With PayPal <i class="fab fa-paypal"></i></strong>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--end::Col-->
                        @endif
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
</div>
