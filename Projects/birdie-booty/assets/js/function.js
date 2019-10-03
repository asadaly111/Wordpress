$(document).ready(function(){

	$(".left1").boxLoader({
	    direction:"x",
	    position: "-50%",
	    effect: "fadeIn",
	    duration: "2s",
	    windowarea: "60%"
});

	$(".right1").boxLoader({
	    direction:"x",
	    position: "50%",
	    effect: "fadeIn",
	    duration: "2s",
	    windowarea: "60%"
});



	$(".inn").boxLoader({
	    direction:"none",
	    position: "100%",
	    effect: "fadeIn",
	    duration: "2s",
	    windowarea: "30%"
});




$(".botTop").boxLoader({
	    direction:"y",
	    position: "100%",
	    effect: "none",
	    duration: "2s",
	    windowarea: "50%"
});
 
	$(".up i").click(scroll);

});

/*hide on 768*/
	var windowWidth = jQuery(window).width();
	 console.log(windowWidth);
if(windowWidth < 768){

	jQuery('.h').removeClass('inn');
	jQuery('.h').removeClass('left1');
	jQuery('.h').removeClass('right1');

}


function scroll(){

	$("html, body").animate({
        scrollTop: $(".boxes").offset().top
    }, {
    	queue: false,
    	duration: 1000});

}



 
