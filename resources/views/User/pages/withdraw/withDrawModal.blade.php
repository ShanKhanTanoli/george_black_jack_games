<form action="{{ route('UserRequestWithDraw' , Auth::user()->id ) }}" method="POST">
    @csrf
    <!-- The Modal -->
    <div class="modal fade" id="withDrawModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Request for Withdraw</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Enter Amount(USD)</label>
                        <input type="number" name="amount" value="{{Subscriber::ActiveSubscription(Auth::user()->id)->quantity*number_format(Subscriber::ActiveSubscription(Auth::user()->id)->coin_price) }}" class="form-control" placeholder="Enter Amount" id="amount">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Request Withdraw</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
