@if(!is_null(Game::All()))
<section id="project-img" class="project-img games-page back-light section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <div class="heading">
                    <h2>Scan QR Code and login</h2>
                    <img src="{{ asset('LandingPage/images/heading-border-effect.png') }}" class="img-fluid" alt="effect">
                </div>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-lg-12 px-0">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="row mx-0">
                            <div class="col-md-6 col-lg-6 col-sm-12 m-auto">
                                <video id="preview" style="width: 100%;"></video>
                                <!-- Scanner Start -->
                                <script>
                                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                                scanner.addListener('scan', function(content) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                            url: "{{ route('Qrlogin') }}",
                                            type: 'POST',
                                            data: {
                                                scannedData: content,
                                            },
                                        })
                                        .done(function(data) {
                                            window.location = "/";
                                        })
                                        .fail(function(e) {

                                        });
                                });
                                Instascan.Camera.getCameras().then(function(cameras) {
                                    if (cameras.length > 0) {
                                        scanner.start(cameras[0]);
                                    } else {
                                        console.error('No cameras found.');
                                    }
                                }).catch(function(e) {
                                    console.error(e);
                                });

                                </script>
                                <!-- Scanner End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
