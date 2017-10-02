

(function($) {
    'use strict'; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 200)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 151
    });

   /* 
    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse').click(function(){ 
            $('.navbar-toggle:visible').click();
    });
    */

   
    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 200
        }
    })

})(jQuery); // End of use strict
