<!-- The Modal -->
<div class="modal fade" id="AddNewGiftCardModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add a New Gift Card</h4>
                <button type="button" id="CloseModalCamera" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('UserAddGiftCard') }}">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <video id="preview" width="100%" ;>
                    </video>
                    <hr>
                    <h3>Scan the QR Code Or Type Manually</h3>
                    <div class="form-group">
                        <label>Gift Card Number</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Enter GiftCard Number" id="code" name="code" required />
                        <span class="form-text text-muted">Enter the Gift Card Number by Using Dashes e.g 3333-3333-3333-3333.</span>
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add Card</button>
                    <button type="button" data-dismiss="modal" id="CloseCamera" class="btn btn-danger">Close</button>
                </div>
            </form>
            <!--begin::Form-->
            <script>
            $(document).ready(function() {
                $('#StartCamera').click(function() {
                    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                    scanner.addListener('scan', function(content) {
                        document.getElementById("code").value = content;
                    });
                    Instascan.Camera.getCameras().then(function(cameras) {
                        if (cameras.length > 0) {
                            scanner.start(cameras[0]);
                            $('#CloseCamera').click(function() {
                                scanner.stop(cameras[0]);
                            });
                            $('#CloseModalCamera').click(function() {
                                scanner.stop(cameras[0]);
                            });
                        } else {
                            console.error('No cameras found.');
                        }
                    }).catch(function(e) {
                        console.error(e);
                    });
                });
            });

            </script>
        </div>
    </div>
</div>
