(function($) {
    'use strict';
    $(document).ready(function(){
        
        // $('#ajoutSon').on('submit','.fn-form-modal-media', function (event) {
        //     event.preventDefault();
        //     var $form = $(this);
        //
        //
        //     //var formdata = (window.FormData) ? new FormData($form[0]) : null;
        //
        //     //var data = (formdata !== null) ? formdata : $form.serialize();
        //
        //
        //     $.ajax({
        //         url: $form.attr('action'),
        //         type: $form.attr('method'),
        //         data: new FormData($form[0]),
        //
        //         processData: false, // obligatoire pour de l'upload
        //         contentType: false, // obligatoire pour de l'upload
        //
        //         // statusCode: {
        //         //
        //         //     //traitement en cas de succès
        //         //     200: function (response) {
        //         //         var message = response.message;
        //         //         console.log(response);
        //         //         console.log(message);return;
        //         //
        //         //
        //         //         $('.mediaModal-lg').fadeOut('fast');
        //         //         $('body').removeClass('modal-open');
        //         //         $('.modal-backdrop').remove();
        //         //
        //         //     },
        //         //     412: function (response, event) {
        //         //        // callback(response);
        //         //     }
        //         // }
        //
        //         success: function (response) {
        //
        //             console.log('les donnees',response);return;
        //             if (response) {
        //                 //$('.mediaModal-lg').modal('hide');
        //                 $('.mediaModal-lg').fadeOut('fast');
        //                 $('body').removeClass('modal-open');
        //                 $('.modal-backdrop').remove();
        //                 //location.reload();
        //             }
        //         }
        //     });
        // });

        $('#ajoutSon').on('submit','.fn-form-modal-media', function (event) {
            
            event.preventDefault();
            var $form = $(this);
            console.log('formulaire',$form);

            var formdata = (window.FormData) ? new FormData($form[0]) : null;

            var data = (formdata !== null) ? formdata : $form.serialize();


            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: data,

                processData: false, // obligatoire pour de l'upload
                contentType: false, // obligatoire pour de l'upload

                // statusCode: {
                //
                //     //traitement en cas de succès
                //     200: function (response) {
                //         var message = response.message;
                //         console.log(response);
                //         console.log(message);return;
                //
                //
                //         $('.mediaModal-lg').fadeOut('fast');
                //         $('body').removeClass('modal-open');
                //         $('.modal-backdrop').remove();
                //
                //     },
                //     412: function (response, event) {
                //        // callback(response);
                //     }
                // }

                success: function (response) {

                    console.log('les donnees',response);return;
                    if (response) {
                        //$('.mediaModal-lg').modal('hide');
                        $('.mediaModal-lg').fadeOut('fast');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        //location.reload();
                    }
                }
            });
        });


    });

})(jQuery);