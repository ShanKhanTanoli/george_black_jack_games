<div class="container">
    <!--begin::Card-->
    @if($TotalEarnings > 0) <div class="card card-custom overflow-hidden">
        <div class="card-body p-0">
            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="table-responsive">
                        <h2 class="text-center text-uppercase"> before Paid Out</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-uppercase">SUBSCRIPTION AMOUNT IN TOTAL</th>
                                    <th class="font-weight-bold text-uppercase">TOTAL SUBSCRIPTIONS</th>
                                    <th class="font-weight-bold text-uppercase">TOTAL PAYOUTS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="font-weight-bolder">
                                    <td class="text-danger font-size-h3 font-weight-boldest">{{ number_format($TotalEarnings,"2") }} USD</td>
                                    <td class="text-danger font-size-h3 font-weight-boldest">{{ \App\Subscription::count() }}</td>
                                    <td class="text-danger font-size-h3 font-weight-boldest">{{ Payout::count() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h2 class="text-center text-uppercase">After Paid Out</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-uppercase">PAID OUT AMOUNT</th>
                                    <th class="font-weight-bold text-uppercase">SUB TOTAL</th>
                                    <th class="font-weight-bold text-uppercase">EARNED IN TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="font-weight-bolder">
                                    <td class="text-danger font-size-h3 font-weight-boldest">{{ number_format(Payout::sum('paidamount'),2) }} USD</td>
                                    <td class="text-danger font-size-h3 font-weight-boldest">{{ number_format($TotalEarnings,2) }}
                                        -
                                        {{ number_format(Payout::sum('paidamount'),2) }}</td>
                                    <td class="text-danger font-size-h3 font-weight-boldest">{{ number_format($TotalEarnings-Payout::sum('paidamount'),2) }} USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Account Balance</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Card-->
    @else
    <div class="card card-custom overflow-hidden">
        <div class="card-body p-0">
            <!-- begin: Invoice-->
            <div class="alert alert-danger">
                You have 0 Balance.
            </div>
            <!-- end: Invoice-->
        </div>
    </div>
    @endif
</div>
