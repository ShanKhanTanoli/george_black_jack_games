<!--begin::Modal -->
<div class="modal fade" id="SUB{{ $subscription->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ User::find($subscription->user_id )->firstname }}{{ User::find($subscription->user_id )->lastname }} Subscription #{{ $subscription->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('AdminUpdateSubscriptions',$subscription->id)}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="charge_id">Game Name</label>
                        <input disabled="disabled" type="text" value="{{ ucwords(Game::Info($subscription->game_id)->name) }}" class="form-control" placeholder="Game Name">
                    </div>
                    <div class="form-group">
                        <label for="charge_id">Charge ID</label>
                        <input disabled="disabled" type="text" value="{{ $subscription->charge_id }}" class="form-control" placeholder="Charge ID">
                    </div>
                    <div class="form-group">
                        <label for="payment_intent">Payment Intent</label>
                        <input disabled="disabled" type="text" value="{{ $subscription->payment_intent }}" class="form-control" placeholder="Payment Intent">
                    </div>
                    <div class="form-group">
                        <label for="payment_intent">Status</label>
                        @if($subscription->status == 1)
                        <span class="badge badge-success">
                            Active
                        </span>
                        @else
                        @if($subscription->stripe_status == "succeeded")
                        <span class="badge badge-danger">
                            Expired
                        </span>
                        @else
                        <div class="alert alert-danger" role="alert">
                            {{ $subscription->stripe_status }}
                        </div>
                        @endif
                        @endif
                    </div>
                    @if($subscription->status == 1)
                    <!--begin::If Active Subscription-->
                    <div class="input-group mt-3 mb-3">
                        <select name="status" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Cancel</option>
                        </select>
                    </div>
                    <strong class="text-danger">Cancelled Suscription can be Re-Active again.</strong>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input name="amount" type="text" value="{{ $subscription->amount }}" class="form-control" placeholder="Amount" id="amount" required />
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input name="quantity" type="text" value="{{ $subscription->quantity }}" class="form-control" placeholder="Coins Quantity" id="quantity" required />
                    </div>
                    <div class="form-group">
                        <label for="subscription_date">Subscribed At</label>
                        <input name="subscription_date" class="form-control" type="datetime-local" value="{{date('Y-m-d',strtotime($subscription->created_at)) }}T{{ date('h:i:s',strtotime($subscription->created_at)) }}" id="example-datetime-local-input" required />
                    </div>
                    @if($subscription->created_at != $subscription->updated_at)
                    <div class="form-group">
                        <label for="resubscription_date">Re-Subscribed At</label>
                        <input name="resubscription_date" class="form-control" type="datetime-local" value="{{date('Y-m-d',strtotime($subscription->updated_at)) }}T{{ date('h:i:s',strtotime($subscription->updated_at)) }}" id="example-datetime-local-input" required />
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="ends_at">Ended At</label>
                        <input name="ends_at" class="form-control" type="datetime-local" value="" id="example-datetime-local-input">
                    </div>
                    <!--end::If Active Subscription-->
                    @else
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input disabled="disabled" type="text" value="{{ $subscription->amount }}" class="form-control" placeholder="Amount">
                    </div>
                    <div class="form-group">
                        <label for="amount">Quantity</label>
                        <input disabled="disabled" type="text" value="{{ $subscription->quantity }}" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label for="subscription_date">Subscription Date</label>
                        <input disabled="disabled" type="text" value="{{ date('d/M/Y h:i:s a',strtotime($subscription->created_at)) }}" class="form-control" placeholder="Subscription Date">
                    </div>
                    <div class="form-group">
                        <label for="resubscription_date">Re-Subscribed At</label>
                        <input disabled="disabled" type="text" value="{{ date('d/M/Y h:i:s a',strtotime($subscription->updated_at)) }}" class="form-control" placeholder="Subscription Date">
                    </div>
                    <div class="form-group">
                        <label for="ends_at">Ended At</label>
                        <input disabled="disabled" type="text" value="{{ date('d/M/Y h:i:s a',strtotime($subscription->ends_at)) }}" class="form-control" placeholder="Ended At">
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    @if($subscription->status == 1)
                    <button type="submit" class="btn btn-dark">Update & Save changes</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal -->
