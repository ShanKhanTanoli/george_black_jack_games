<section id="contact-us" class="contact-us back-dark contact section">
    <div class="container">
        @if(!is_null(Site::HasLandingPage()))
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="contact-about">
                    <div class="heading">
                        <h2 class="text-center">{!! Site::HasLandingPage()->about_heading !!}</h2>
                        <img src="{{ asset('LandingPage/images/heading-border-effect.png')}}" class="img-fluid" alt="effect">
                         <img src="{{ asset('LandingPage/images/heading-border-effect.png')}}" class="img-fluid" alt="effect">
                    </div>
                    <p class="mb30">{!! Site::HasLandingPage()->about_description !!}</p>
                </div>
            </div>
        </div>
        @endif
        <div class="row control-pad">
            <div class="border-effect1">
                <img src="{{ asset('LandingPage/images/border-effect.png')}}" class="img-fluid" alt="effect">
            </div>
            <div class="border-effect2">
                <img src="{{ asset('LandingPage/images/border-effect.png')}}" class="img-fluid" alt="effect">
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-md-12 bot-menu">
                <div class="foot-menu">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('gallery') }}">Games</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="copy-right">
                    <h6>Copyright &copy; {{ date('Y') }}. All Rights Reserved</h6>
                </div>
            </div>
        </div>
    </div>
</section>
