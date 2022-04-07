<!-- The Modal -->
<div class="modal fade" id="ViewPrint{{$voucher->id}}Modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{!! $voucher->name !!}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
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
                                        {!! $voucher->name !!} </text>
                                    <text x="165" y="20" style="font-size:16;fill:#FFF;">
                                        {!! $voucher->code !!} </text>
                                    <text x="5" y="105" style="font-size:16;fill:#FFF;">
                                    </text>
                                    <label>Card Expiry</label>
                                    @if(!is_null($voucher->expires_at))
                                    <text x="5" y="160" style="font-size:16;fill:#FFF;">
                                        Expiry: {!! $voucher->expires_at->format('d M Y')!!} </text>
                                    @endif
                                    <!--begin::Bar Code-->
                                    <div class="bar-code">
                                        <?php echo QrCode::color(0, 0, 0)->backgroundColor(255, 255, 255,100)->encoding('UTF-8')->generate($voucher->code);?>
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
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" onclick="window.print();" class="btn btn-info" data-dismiss="modal"><i class="fas fa-print"></i>Print this Card</button>
            </div>
        </div>
    </div>
</div>
