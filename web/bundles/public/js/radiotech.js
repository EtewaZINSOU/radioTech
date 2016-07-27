(function($) {
    'use strict';
    $(document).ready(function(){
        $('#ajoutSon').on('submit','.fn-form-modal-media', function (event) {
            
            event.preventDefault();
            var $form = $(this);

            var formdata = (window.FormData) ? new FormData($form[0]) : null;

            var data = (formdata !== null) ? formdata : $form.serialize();


            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: data,

                processData: false, // obligatoire pour de l'upload
                contentType: false, // obligatoire pour de l'upload

                success: function (response) {
                    if (response) {
                        console.log(response);
                        //$('.mediaModal-lg').modal('hide');
                        $('.mediaModal-lg').fadeOut('fast');
                        //$('body').removeClass('modal-open');
                        $('#ajoutSon').html(response.media);
                        location.reload();
                    }
                }
            });
        });


    });

})(jQuery);