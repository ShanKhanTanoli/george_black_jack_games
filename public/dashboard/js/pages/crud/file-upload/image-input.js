'use strict';

// Class definition
var KTImageInputDemo = function() {
    // Private functions
    var initDemos = function() {
        // Example 1
        var avatar1 = new KTImageInput('kt_image_1');


        // avatar1.on('cancel', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully canceled !',
        //         type: 'success',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Awesome!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });

        // avatar1.on('change', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully changed !',
        //         type: 'success',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Awesome!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });

        // avatar1.on('remove', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully removed !',
        //         type: 'error',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Got it!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });




    }

    return {
        // public functions
        init: function() {
            initDemos();
        }
    };
}();

KTUtil.ready(function() {
    KTImageInputDemo.init();
});
