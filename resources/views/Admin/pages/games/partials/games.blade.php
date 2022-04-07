<div class="col-xl-4">
    <!--begin::Nav Panel Widget 4-->
    <div class="card card-custom card-stretch gutter-b">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column h-100">
                <!--begin::Container-->
                <div class="h-100">
                    <!--begin::Header-->
                    <div class="d-flex flex-column flex-center">
                        <!--begin::Image-->
                        @if(!is_null(Game::Settings($game->id)->scratchcardImage))
                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100" style="background-image: url('{{ asset('images/scratchcard/'.Game::Settings($game->id)->scratchcardImage ) }}')">
                        </div>
                        @else
                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100" style="background-image: url('{{ asset('images/defaut.jpg' ) }}')">
                        </div>
                        @endif
                        <!--end::Image-->
                        <!--begin::Title-->
                        <strong href="#" class="card-title font-weight-bolder text-primary font-size-h4 m-0 pt-7 pb-1">{{ $game->name }}</strong>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <p class="col-xl-12">{{ $game->description }}</p>
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
                                <strong class="text-primary mb-1 font-size-lg font-weight-bolder">Price</strong>
                            </div>
                            <!--end::Text-->
                            <!--begin::label-->
                            <span class="font-weight-bolder label label-xl label-light-primary label-inline py-5 min-w-45px">${{ $game->price }} USD</span>
                            <!--end::label-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--eng::Container-->
                <!--begin::Footer-->
                <div class="d-flex flex-center">
                    <a href="{{ route('PlayGame',['name' => $game->name,'id' => $game->id]) }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14">Play</a>
                    <a href="{{ route('AdminConfigureGame',['name' => $game->name,'id' => $game->id]) }}" class="ml-2 btn btn-success font-weight-bolder font-size-sm py-3 px-14">Edit</a>
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Nav Panel Widget 4-->
</div>
