<!--begin::Modal -->
<div class="modal fade" id="createSubscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Subscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('AdminCreateSubscriptions') }}">
                @csrf
                <div class="modal-body">
                    @if(!is_null(Game::all()))
                    <label for="charge_id">Select Game</label>
                    <div class="input-group mt-3 mb-3">
                        <select name="game" class="form-control">
                            @foreach(Game::all() as $game)
                            <option value="{{ $game->id }}">{{ $game->name }} and Price is {{ $game->coin_price }} USD</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    @if(User::count() > 0)
                    <label for="charge_id">Subscriber</label>
                    <div class="input-group mt-3 mb-3">
                        <select name="subscriber_id" class="form-control">
                            @foreach(User::all() as $subscriber)
                            @if($subscriber->role_id == 2)
                            <option value="{{ $subscriber->id }}">{{ $subscriber->firstname }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <strong class="text-danger">If once Selected as Expire then can not make it Active</strong>
                    <div class="form-group">
                        <label for="amount">Enter Amount(USD)</label>
                        <input name="amount" type="number" value="0" class="form-control" placeholder="Amount" id="amount" required />
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input name="quantity" type="number" value="0" class="form-control" placeholder="Coins Quantity" id="quantity" required />
                    </div>
                    <div class="form-group">
                        <label for="subscription_date">Subscribed At</label>
                        <input name="subscription_date" class="form-control" type="datetime-local" value="" id="example-datetime-local-input" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal -->
