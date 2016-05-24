(function($) {
    'use strict';
    var hauteur=$(window).height();

    $('.blocBarres').click(function(e){
        e.preventDefault();
        if($(this).hasClass('menuOuvert')){
            $(this).removeClass('menuOuvert');
            $('body').css('overflow','visible');
        } else {
            $(this).addClass('menuOuvert');
            $('body').css('overflow','hidden');
        }
    });
    $('li.connexion > a').click(function(e){
        e.preventDefault();
        if($(this).hasClass('menuOuvert')){
            $(this).removeClass('menuOuvert');
        } else {
            $(this).addClass('menuOuvert');
        }
    });

    $('.chaines a').click(function(e){
        e.preventDefault();
    });

    //Centrer le logo
    $('.titre').css('top',(($('#titrePrincipal').height()/2)-($('.titre').height()))+'px');


    //Carroussel
    $(document).ready(function(){
        $(".chaines").owlCarousel({
            items      : 1,
            singleItem : true,
            loop  	   : true,
            mergeFit : true,
            lazyLoad : true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:false,
                    mouseDrag : true,
                    touchDrag : true
                },
                600:{
                    items:2,
                    nav:false,
                    mouseDrag : true,
                    touchDrag : true
                },
                1000:{
                    items:3,
                    nav:true,
                    loop:true
                }
            },

            //Basic Speeds
            slideSpeed : 900,
            dotsSpeed : 1200,
            rewindSpeed : 1800,
            navSpeed : 1200,

            //Autoplay
            autoplay : true,
            autoplaySpeed : 1500,
            autoplayTimeout: 2000,
            autoplayHoverPause:true,

            // Navigation
            nav : true,
            mouseDrag : false,
            touchDrag : false,
            dots: true
        });
    });
})(jQuery);