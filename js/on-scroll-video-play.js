I finally found a way: you'll need the visible plugin, and this little piece of code right here:	
 
Vissible pluggin 
https://github.com/customd/jquery-visible
  
  
  jQuery(window).scroll(function() {
		jQuery('video').each(function(){
			if (jQuery(this).visible( true )) {
				jQuery(this)[0].play();
				console.log('play');
			} else {
				jQuery(this)[0].pause();
				console.log('pause');
			}
		})
	});



 jQuery(window).scroll(function() {
	
});




var targetOffset = jQuery("section#sectionvideo").offset().top-300;
var $w = jQuery(window).scroll(function(){
    if ( $w.scrollTop() > targetOffset ) {   
       jQuery("section#sectionvideo video")[0].play();
    }else{
    	jQuery("section#sectionvideo video")[0].pause();
    } 
});

<script type="text/javascript">
	var targetOffset = jQuery("section#sectionvideo").offset().top-300;
var $w = jQuery(window).scroll(function(){
	if ( $w.scrollTop() > targetOffset ) {   
		jQuery("section#sectionvideo video")[0].play();
	}else{
		jQuery("section#sectionvideo video")[0].pause();
	} 
});
</script>



 var isvideo = false;
var targetOffset = jQuery("section#sectionvideo").offset().top-300;
var $w = jQuery(window).scroll(function(){
	if ( $w.scrollTop() > targetOffset ) {   
		if (isvideo == false) {
// 			jQuery(".video-overlay").hide();
// 			jQuery("section#sectionvideo video")[0].play();
			isvideo = true;
		}
	}else{
		jQuery("section#sectionvideo video")[0].pause();
		console.log(0);
	} 
});