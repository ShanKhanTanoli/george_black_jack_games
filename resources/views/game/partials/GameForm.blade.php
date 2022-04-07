<!--begin::Form-->
<form class="form" method="POST" action="{{ route('SaveConfigurations',$game->id) }}">
    @csrf
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Winning Percentage</label>
                <input type="text" name="win_occurrence" class="form-control @error('win_occurrence')is-invalid @enderror" placeholder="Enter Winning Percentage" value="{{ $game->win_occurrence}}">
                <span class="form-text text-muted">Set Winng Percentage( e.g {{ $game->win_occurrence}}%)</span>
                @error('win_occurrence')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Slot Cash</label>
                <input type="text" name="slot_cash" class="form-control @error('slot_cash')is-invalid @enderror" placeholder="Enter Slot Cash" value="{{ $game->slot_cash}}">
                <span class="form-text text-muted">Set Slot Cash</span>
                @error('slot_cash')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Bonus Percentage</label>
                <input type="text" name="bonus_occurrence" class="form-control @error('bonus_occurrence')is-invalid @enderror" placeholder="Enter Bonus Occurence Percentage" value="{{ $game->bonus_occurrence}}">
                <span class="form-text text-muted">Set Bonus Percentage( e.g {{ $game->bonus_occurrence}}%)</span>
                @error('bonus_occurrence')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Minimum Bet Amount</label>
                <input type="text" name="min_bet" class="form-control @error('min_bet')is-invalid @enderror" placeholder="Enter Minimum Reel Loop" value="{{ $game->min_bet}}">
                <span class="form-text text-muted">Set Minimum Bet Amount</span>
                @error('min_bet')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Maximum Bet Amount</label>
                <input type="text" name="max_bet" class="form-control @error('max_bet')is-invalid @enderror" placeholder="Enter Maximum Bet Amount" value="{{ $game->max_bet }}">
                <span class="form-text text-muted">Set Maximum Bet Amount</span>
                @error('max_bet')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Hold Maximum Slots</label>
                <input type="text" name="max_hold" class="form-control @error('max_hold')is-invalid @enderror" placeholder="Enter Maximum Slots" value="{{ $game->max_hold }}">
                <span class="form-text text-muted">Set Maximum Slots</span>
                @error('max_hold')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Win Prize 1</label>
                <input type="text" name="perc_win_prize_1" class="form-control @error('perc_win_prize_1')is-invalid @enderror" placeholder="Enter Win Prize 1" value="{{ $game->perc_win_prize_1}}">
                <span class="form-text text-muted">Set Win Prize 1</span>
                @error('perc_win_prize_1')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Win Prize 2</label>
                <input type="text" name="perc_win_prize_2" class="form-control @error('perc_win_prize_2')is-invalid @enderror" placeholder="Enter Win Prize 2" value="{{ $game->perc_win_prize_2 }}">
                <span class="form-text text-muted">Set Win Prize 2</span>
                @error('perc_win_prize_2')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Win Prize 3</label>
                <input type="text" name="perc_win_prize_3" class="form-control @error('max_hold')is-invalid @enderror" placeholder="Enter Win Prize 3" value="{{ $game->perc_win_prize_3 }}">
                <span class="form-text text-muted">Set Win Prize 3</span>
                @error('perc_win_prize_3')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <!--show_credits-->
            <label class="col-3 col-form-label">Show Credits</label>
            <div class="col-3">
                <span class="switch switch-info">
                    <label>
                        @if( $game->show_credits == 1)
                        <input type="checkbox" checked="checked" name="show_credits">
                        <span></span>
                        @else
                        <input type="checkbox" name="show_credits">
                        <span></span>
                        @endif
                    </label>
                </span>
            </div>
            <!--music_enable_on_startup-->
            <label class="col-3 col-form-label">Sound</label>
            <div class="col-3">
                <span class="switch switch-info">
                    <label>
                        @if($game->audio_enable_on_startup == 1)
                        <input type="checkbox" checked="checked" name="audio_enable_on_startup">
                        <span></span>
                        @else
                        <input type="checkbox" name="audio_enable_on_startup">
                        <span></span>
                        @endif
                    </label>
                </span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-8">
                <button type="submit" class="btn btn-success mr-2">Save Changes</button>
            </div>
        </div>
    </div>
</form>
<!--end::Form-->
