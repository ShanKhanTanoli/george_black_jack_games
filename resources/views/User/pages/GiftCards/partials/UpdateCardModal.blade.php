<!-- The Modal -->
<div class="modal fade" id="UpdateCard{{$voucher->id}}Modal">
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
                        <!--begin::Col-->
                        <div class="col-sm-12 col-lg-12">
                            <h3 class="card-title  flex-column text-center mb-5">
                                <span class="card-label font-weight-bolder text-dark">Update Card</span>
                                <br>
                                <span class="text-muted small">Set a Title for Your Card</span>
                            </h3>
                            <form id="PayNow" method="POST" action="{{ route('UserUpdateGiftCard',$voucher->id) }}">
                                @csrf
                                <div class="form-group col-sm-12">
                                    <input class="form-control @error('card_name') is-invalid @enderror" type="text" placeholder="Current Amount in This Card" name="card_name" id="card_name" value="{!! $voucher->name !!}" autocomplete required />
                                    @error('card_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-info btn-lg btn-block">
                                        <strong>Update Card</strong>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
</div>
