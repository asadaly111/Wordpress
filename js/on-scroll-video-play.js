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
