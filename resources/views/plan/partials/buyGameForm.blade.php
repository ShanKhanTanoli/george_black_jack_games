<div class="col-xl-6">
    <!--begin::Nav Panel Widget 4-->
    <div class="card card-custom card-stretch gutter-b">
        <!--begin::Body-->
        <div class="card-body">
            <form action="{{ route('CustomerPayNow') }}" id="payment-form">
                <input type="hidden" value="{{ Game::Casino()->price_id}}" name="price_id">
                <input type="hidden" value="{{ Game::Casino()->coin_price}}" name="price">
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column h-100">
                    <!--begin::Container-->
                    <div class="h-100">
                        <!--begin::Header-->
                        <div class="d-flex flex-column flex-center">
                            @if(isset(Game::Casino()->gameAvatar))
                            <!--begin::Image-->
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100" style="background-image: url('{{ asset('images/game/'. Game::Casino()->gameAvatar ) }}')">
                            </div>
                            <!--end::Image-->
                            @else
                            <!--begin::Image-->
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100" style="background-image: url('{{ asset('images/defaut.jpg' ) }}')">
                            </div>
                            <!--end::Image-->
                            @endif
                            <!--begin::Title-->
                            <strong href="#" class="card-title font-weight-bolder text-primary font-size-h4 m-0 pt-7 pb-1">{{ Game::Casino()->name}}</strong>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <p class="col-xl-12">{{ Game::Casino()->description }}</p>
                            <!--end::Text-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="pt-1">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center pb-9">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-4">
                                    <span class="symbol-label ">
                                        <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                            <i class="fas  text-primary fa-money-check-alt"></i>
                                        </span>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <strong class="text-primary mb-1 font-size-lg font-weight-bolder">Coin Price</strong>
                                </div>
                                <!--end::Text-->
                                <!--begin::label-->
                                <span class="font-weight-bolder label label-xl label-light-primary label-inline py-5 min-w-45px">${{ Game::Casino()->coin_price }} USD</span>
                                <!--end::label-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center pb-9">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-4">
                                    <span class="symbol-label ">
                                        <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                            <i class="fas  text-primary fa-sort-amount-up-alt"></i>
                                        </span>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <strong class="text-primary mb-1 font-size-lg font-weight-bolder">Quantity</strong>
                                </div>
                                <!--end::Text-->
                                <!--begin::label-->
                                <div class="col-xl-4" style="padding-right: 0px;">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                                <span class="fas fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="{{ Game::Casino()->min_coins }}" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                <span class="fas fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <!--end::label-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--eng::Container-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-center">
                        <button type="submit" class="btn btn-dark font-weight-bolder font-size-sm py-3 px-14">
                            Buy Now
                        </button>
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </form>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Nav Panel Widget 4-->
</div>
