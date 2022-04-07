@if(!is_null($voucher->status))
<div class="alert alert-custom alert-light-info fade show mb-10" role="alert">
    <div class="alert-icon">
        <span class="svg-icon svg-icon-3x svg-icon-info">
            <i class="fas fa-info text-info"></i>
        </span>
    </div>
    <div class="alert-text font-weight-bold">
        @if($voucher->status == "expired")
        <strong> {{ __('This '.$voucher->name.' was '.strtoupper($voucher->status).' on '.date('d-M-Y',strtotime($voucher->expires_at)).' with a Balance of '.$voucher->price.' USD') }}</strong>
        @endif
        @if($voucher->status == "available")
        <strong> {{ __('This '.$voucher->name.' is '.strtoupper($voucher->status).' with a Balance of '.$voucher->price.' USD') }}</strong>
        @endif
        @if($voucher->status == "CashOut")
        <strong> {{ __('This '.$voucher->name.' has been '.strtoupper($voucher->status)) }}</strong>
        @endif
        @if($voucher->status == "redeemed")
        <strong> {{ __('This '.$voucher->name.' is '.strtoupper($voucher->status)) }}</strong>
        @endif
        @if($voucher->status == "recharged")
        <strong> {{ __('This '.$voucher->name.' was '.strtoupper($voucher->status).' on '.date('d-M-Y',strtotime($voucher->updated_at))) }}</strong>
        @endif
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
