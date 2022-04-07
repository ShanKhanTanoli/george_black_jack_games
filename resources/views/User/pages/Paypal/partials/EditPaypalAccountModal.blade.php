<!-- The Modal -->
<div class="modal fade" id="EditPaypalAccount{{$account->id}}Modal">
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
                                <span class="card-label font-weight-bolder text-dark">Update Account</span>
                                <br>
                                <span class="text-muted small">Update Your PayPal Account</span>
                            </h3>
                            <form id="PayNow" method="POST" action="{{ route('UpdatePaypalAccount',$account->id) }}">
                                @csrf
                                <div class="form-group col-sm-12">
                                    <input class="form-control @error('paypal_id') is-invalid @enderror" type="text" placeholder="Current Amount in This Card" name="paypal_id" id="paypal_id" value="{{ $account->paypal_id }}" autocomplete required />
                                    @error('paypal_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-info btn-lg btn-block">
                                        <strong>Update Account</strong>
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
