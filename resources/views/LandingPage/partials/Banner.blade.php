@if(!is_null(Site::HasLandingPage()))
<section id="banner" class="banner-inner main_page" style="background:url(<?php echo asset('LandingPage/images/upload/'.Site::HasLandingPage()->hero_image);?>); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    position: relative;">
    <!-- banner-background -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6 banner-center">
                <div class="banner_text">
                    <h1 class="title">{!! Site::HasLandingPage()->page_heading!!}</h1>
                    <h3>{!! Site::HasLandingPage()->short_description!!}</h3>
                    <p>{!! Site::HasLandingPage()->long_description!!}</p>
                    <div class="casino-btn">
                        <a href="{{ route('gallery') }}" class="btn-4 yellow-btn">Games</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
