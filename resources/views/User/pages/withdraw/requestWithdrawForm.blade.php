<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        @if(!is_null(Auth::user()->stripe_connect_id))
        @if(!is_null(Subscriber::ActiveSubscription(Auth::user()->id)))
        <!-- begin: Invoice-->
        <!-- begin: Invoice footer-->
        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="font-weight-bold text-muted text-uppercase">TO DATE</th>
                                <th class="font-weight-bold text-muted text-uppercase">PICE PER COIN</th>
                                <th class="font-weight-bold text-muted text-uppercase">COINS QUANTITY</th>
                                <th class="font-weight-bold text-muted text-uppercase">TOTAL AMOUNT</th>
                                <th class="font-weight-bold text-muted text-uppercase">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="font-weight-bolder">
                                <td class="text-danger font-weight-boldest">{{ date("d M Y", strtotime(Subscriber::ActiveSubscription(Auth::user()->id)->updated_at) ) }}</td>
                                <td class="text-danger font-weight-boldest">{{ number_format(Subscriber::ActiveSubscription(Auth::user()->id)->coin_price,2) }} USD</td>
                                <td class="text-danger font-weight-boldest">{{ number_format(Subscriber::ActiveSubscription(Auth::user()->id)->quantity) }}</td>
                                <td class="text-danger font-weight-boldest">{{Subscriber::ActiveSubscription(Auth::user()->id)->quantity*number_format(Subscriber::ActiveSubscription(Auth::user()->id)->coin_price,2) }} USD</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#withDrawModal">Withdraw</button>
                                </td>
                                @include('User.pages.withdraw.withDrawModal')
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr class="font-weight-bolder">
                                <td class="text-success font-weight-boldest">
                                    <div class="alert alert-info" role="alert">
                                        You have Successfully Requested for withdrawn.Your request is pending.Please wait for approval.
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        @else
        <strong class="text-danger">
            You don't have Stripe Connect Account.Create stripe Connect Account in Order to recieve payments.
        </strong>
        @endif
        <br />
        @if($totalWinningAmount < $withdraw->minLimit)
            <strong class="text-danger">
                You can not Withdraw at this moment.Your winning amount of {{ $totalWinningAmount }} USD is Less than {{ $withdraw->minLimit}} USD
            </strong>
            @endif
    </div>
</div>
