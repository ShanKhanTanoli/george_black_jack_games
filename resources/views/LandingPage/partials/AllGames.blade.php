@if(!is_null(Game::All()))
<section id="project-img" class="project-img games-page back-light section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <div class="heading">
                    <h2>All Games</h2>
                    <img src="{{ asset('LandingPage/images/heading-border-effect.png') }}" class="img-fluid" alt="effect">
                </div>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-lg-12 px-0">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="row mx-0">
                            <!-- Games Grid Start -->
                            @foreach(Game::All() as $game)
                            <div class="col-md-4">
                                <div class="port_img">
                                    <img src="{{ asset('images/game/'.$game->gameAvatar ) }}" class="img-fluid" alt="">
                                    <div class="overlay1">
                                        <div class="overlay-text">
                                            <div class="port-text">
                                                <div class="casino-btn">
                                                    @if(Auth::user())
                                                    <a href="{{ route($game->name) }}">play now</a>
                                                    @else
                                                    <a href="{{ route('login') }}">Login</a>
                                                    @endif
                                                    <h6 class="mt-2">{!! $game->name !!}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Games Grid End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
