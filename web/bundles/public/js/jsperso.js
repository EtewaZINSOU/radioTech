(function($) {
    'use strict';
    $('.blocBarres').click(function(){
        if($(this).hasClass('menuOuvert')){
            $(this).removeClass('menuOuvert');
            $('body').css('overflow','visible');
        } else {
            $(this).addClass('menuOuvert');
            $('body').css('overflow','hidden');
        }
    });
})(jQuery);