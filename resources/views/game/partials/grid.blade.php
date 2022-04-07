<!--begin::Wrapper-->
<form action="{{ route('UserGiftCards') }}" id="payment-form">
    <div class="d-flex justify-content-between flex-column h-100">
        <!--begin::Container-->
        <div class="h-100">
            <!--begin::Header-->
            <div class="d-flex flex-column flex-center">
                <!--begin::Image-->
                <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100" style="background-image: url('{{ asset('images/game/'.$game->gameAvatar ) }}')">
                </div>
                <!--end::Image-->
                <!--begin::Title-->
                <strong href="#" class="card-title font-weight-bolder text-primary font-size-h4 m-0 pt-7 pb-1">{!! $game->name !!}</strong>
                <!--end::Title-->
            </div>
            <!--end::Header-->
        </div>
        <!--end::Container-->
        <!--begin::Footer-->
        <div class="d-flex flex-center">
            @if(Auth::user()->role_id == 1)
            <a href="{{ route($game->name) }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14 m-1">
                Play
            </a>
            <a href="{{ route('ConfigureGame',$game->id) }}" class="btn btn-success font-weight-bolder font-size-sm py-3 px-14 m-1">
                Edit
            </a>
            @endif
            <!--begin::If User-->
            @if(Auth::user()->role_id == 2)
            <!--begin::Game-->
            @if(Subscriber::GiftCardBalance() > 0)
            <a href="{{ route($game->name) }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14 m-1">
                Play
            </a>
            @else
            <button type="submit" class="btn btn-danger font-weight-bolder font-size-sm py-3 px-14 m-1">
                Add Card
            </button>
            @endif
            <!--end::Game-->
            @endif
            <!--end::If User-->
        </div>
        <!--end::Footer-->
    </div>
</form>
<!--end::Wrapper-->
