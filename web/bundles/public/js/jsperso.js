(function($) {
    'use strict';
    $(document).ready(function(){
        var hauteur=$(window).height();

        $('.blocUser .over').height($('.blocUser').height());

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
        $('.blocNL').css('top',(($('.newsletter').height()/2)-($('.blocNL').height()))+'px');


        /***********************************************************/
        /************************** AUDIO **************************/
        /***********************************************************/

        //Ajoute toutes les durée à chaque podcast
        if($('.blocSon').length){
            $('.blocSon').each(function(){
                var audioCharge = new Audio($(this).find('.audioSon').attr('data-src'));
                var tempsDec;
                var el=$(this);
                audioCharge.addEventListener("loadedmetadata", function(_event) {
                    var duree = Math.ceil(audioCharge.duration);
                    var temps=new Date();
                    temps.setTime(duree*1000);

                    tempsDec = duree;
                    if(duree>60){
                        tempsDec = temps.getMinutes()+":"+temps.getSeconds();
                    }
                    if(duree>3600){
                        tempsDec = (temps.getHours()-1)+":"+temps.getMinutes()+":"+temps.getSeconds();
                    }

                    el.find('.dureeSon').html(tempsDec);
                });
            });
        }


        var duration=1;
        var tempsEcoule=0;
        var interval;
        var son;

        $('.audioSon').click(function(e){
            var elemP = $(this).closest('.blocSon');
            $('.lecteur').attr('class','lecteur '+elemP.attr('class'));
            $('.lecteur').find('.infos img').attr('src', elemP.find('img').attr('src'));
            $('.lecteur').find('.titreNom').html(elemP.find('.titreMusique').html() + ' - ' + elemP.find('.uploaderSon').html())


            $('.lecteur').slideDown();

            e.preventDefault();
            $('.pp').attr('id','pause');
            tempsEcoule=0;
            clearInterval(interval);
            interval='';
            son = new Audio($(this).attr('data-src'));

            if (son.canPlayType('audio/mpeg;')) {
                son.type= 'audio/mpeg';
            } else {
                son.type= 'audio/ogg';
            }

            son.addEventListener("loadedmetadata", function(_event) {
                duration = Math.ceil(son.duration);

                var temps=new Date();
                temps.setTime(duration*1000);

                var tempsDec = duration;
                if(duration>60){
                    tempsDec = temps.getMinutes()+":"+temps.getSeconds();
                }
                if(duration>3600){
                    tempsDec = (temps.getHours()-1)+":"+temps.getMinutes()+":"+temps.getSeconds();
                }

                $('.audioFin').html(tempsDec);
                son.play();
                interval = setInterval(progressBar, 1000);
            });
        });

        $('.pp').click(function(e){
            e.preventDefault();
            if($(this).attr('id')=='pause'){
                $(this).attr('id','play');
                son.pause();
                clearInterval(interval);
                interval='';
            } else {
                $(this).attr('id','pause');
                son.play();
                interval = setInterval(progressBar, 1000);
            }
        });

        $('.fermer').click(function(){
            $('.lecteur').slideUp();
            son.pause();
            clearInterval(interval);
            interval='';
            tempsEcoule=0;
        });

        $("#seek").bind("change", function() {
            son.volume = $(this).val();
        });

        var progressBar = function(){
            tempsEcoule++;

            var temps=new Date();
            temps.setTime(tempsEcoule*1000);

            var tempsDec = tempsEcoule;
            if(duration>60){
                tempsDec = temps.getMinutes()+":"+temps.getSeconds();
            }
            if(duration>3600){
                tempsDec = (temps.getHours()-1)+":"+temps.getMinutes()+":"+temps.getSeconds();
            }

            var tailleBar = $('#ecoulement').width();
            $('.progress').stop().animate({'width':(tempsEcoule/duration)*tailleBar+'px'},1000,'linear');
            $('.audioDebut').html(tempsDec);

            if(tempsEcoule==duration){
                clearInterval(interval);
                interval='';
                tempsEcoule=0;
            }
        };

        $('#ecoulement').click(function(e){
            var tailleBar = $('#ecoulement').width();
            var cote = $(this)[0].getBoundingClientRect().left;
            var clic = e.pageX;
            var difference = Math.ceil(clic-cote);
            var newTemps = Math.ceil((difference*duration)/tailleBar);
            son.currentTime = newTemps;
            tempsEcoule=newTemps;
            console.log(newTemps);
        });
    });


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
                    nav:true,
                    mouseDrag : true,
                    touchDrag : true
                },
                600:{
                    items:2,
                    nav:true,
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