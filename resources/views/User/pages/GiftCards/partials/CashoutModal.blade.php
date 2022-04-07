<!-- The Modal -->
<div class="modal fade" id="Cashout{{$voucher->id}}Modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <div class="col-sm-10 col-lg-10">
                </div>
                <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-body d-flex">
                        @if(Site::PaypalCredentials())
                        <!--begin::Col-->
                        @if($accounts = Subscriber::PaypalAccounts(Auth::user()->id))
                        <div class="col-sm-12 col-lg-12">
                            <h3 class="card-title  flex-column text-center mb-5">
                                <span class="card-label font-weight-bolder text-dark">Cashout</span>
                                <br>
                                <span class="text-muted small">Enter Ammount & Select your Paypal Accout.Contact Support for issues.</span>
                            </h3>
                            <form id="PayNow" method="POST" action="{{ route('PaypalCashout',$voucher->id) }}">
                                @csrf
                                <div class="form-group col-sm-12">
                                    <input class="form-control @error('amount') is-invalid @enderror" type="text" placeholder="Current Amount in This Card" name="amount" id="amount" value="{{ $voucher->price }}" autocomplete required />
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <select name="paypal_id" class="form-control">
                                        @foreach($accounts as $account)
                                        <option value="{!! $account->paypal_id !!}">{!! $account->paypal_id !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-info btn-lg btn-block">
                                        <strong>Cashout <i class="fab fa-paypal"></i></strong>
                                    </button>
                                </div>
                            </form>
                        </div>
                        @else
                        <div class="col-sm-12 col-lg-12">
                            <h3 class="card-title  flex-column text-center mb-5">
                                <span class="card-label font-weight-bolder text-dark">Cashout</span>
                                <br>
                                <strong class="text-danger">Please Add Paypal Account in Order to Cashout and Recieve Money.</strong>
                            </h3>
                        </div>
                        @endif
                        <!--end::Col-->
                        @endif
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
</div>
