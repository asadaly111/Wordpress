	jQuery(window).scroll(function(){
    if (jQuery(window).scrollTop() >= 940) {
        jQuery('header#top').addClass('fixed-header');
    }
    else {
        jQuery('header#top').removeClass('fixed-header');
    }
});