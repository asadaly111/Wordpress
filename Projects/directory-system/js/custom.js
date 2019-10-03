



jQuery(document).ready(function (jQuery) {



    jQuery('a[href^="#"]').bind('click.smoothscroll', function (e) {
        e.preventDefault();
        var target = this.hash,
           jQuerytarget = jQuery(target);
        jQuery('html, body').stop().animate({
        'scrollTop': jQuerytarget.offset().top - 0
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });

});


jQuery(document).ready(function () {
    (function (jQuery) {
        
        //Submenu Dropdown Toggle
        if (jQuery('.nav-main .navigation li.dropdown ul').length) {
            jQuery('.nav-main .navigation li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
            //Dropdown Button
            jQuery('.nav-main .navigation li.dropdown .dropdown-btn').on('click', function () {
                jQuery(this).prev('ul').slideToggle(500);
            });
        }
        /* ==========================================================================

           When document is Scrollig, do

           ========================================================================== */
     
    })(window.jQuery);
    // jQuery('.nav-main .navigation li').click(function (e) {
    //     jQuery(this).addClass('active').siblings().removeClass('active');
    // });
 /*   jQuery(function () {
        var url = window.location.pathname; //sets the variable "url" to the pathname of the current window
        var activePage = url.substring(url.lastIndexOf('/') + 1); //sets the variable "activePage" as the substring after the last "/" in the "url" variable
        jQuery('.nav-main .navigation li a').each(function () { //looks in each link item within the primary-nav list
            var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1); //sets the variable "linkPage" as the substring of the url path in each &lt;a&gt;
            if (activePage == linkPage) { //compares the path of the current window to the path of the linked page in the nav item
                jQuery(this).parent().addClass('active').siblings().removeClass('active'); //if the above is true, add the "active" class to the parent of the &lt;a&gt; which is the &lt;li&gt; in the nav list
            }
        });
    });*/

});




	jQuery('document').ready(function(){

		jQuery('.sub,.sub_cats').hide();

		jQuery('#category').on('change', function(){

			jQuery('.sub').hide();

			var show = jQuery(this).find(':selected').data('sub')

			jQuery('input[type=checkbox]').each(function() 

			{ 

			   this.checked = false; 

			});

			jQuery('.sub_cats').show();

			jQuery('#'+show).show();

		});



	});

