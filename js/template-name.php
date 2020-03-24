<?php
/*
* Template Name: Intro Video
*
*/
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>
	<style>
		body{
			background:#000;
			overflow:hidden !important;
		}
		.link{
			color: #fff;
			position: absolute;
			z-index: 9999999999999999999999999999999999999999;
			margin: 10px 0;
			font-family: 'calibri';
			font-size: 25px;
			left: 0;
			right: 0;
			text-transform: uppercase;
		}
	</style>
	<center> <a href="<?php echo site_url('home' ); ?>" class="link">Skip Intro</a></center>
	<!-- Your html structure -->
	<div class="homepage-hero-module">
		<div class="video-container">
			<div class="filter"></div>
			<video autoplay class="fillWidth" onEnded="myFunction()">
				<source src="<?php echo site_url(); ?>/wp-content/themes/thegem/inc/fox_1.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
				</video>
				<div class="poster hidden">
					<!-- <img src="PATH_TO_JPEG" alt=""> -->
				</div>
			</div>
		</div>
		<!-- Your css -->
		<style>
			.homepage-hero-module {border-right: none;border-left: none;position: relative;}
			.no-video .video-container video,.touch .video-container video {display: none;}
			.no-video .video-container .poster, .touch .video-container .poster {display: block !important;}
			.video-container {position: relative;bottom: 0%;left: 0%;height: 100%;width: 100%;overflow: hidden;background: #000;}
			.video-container .poster img {width: 100%;bottom: 0;position: absolute;}
			.video-container .filter {z-index: 100;position: absolute;background: rgba(0, 0, 0, 0.4);width: 100%;}
			.video-container video {position: absolute;z-index: 0;bottom: 0;}
			.video-container video.fillWidth {width: 100%;}
		</style>
		<!-- your Jquery  -->
		<script>
			function myFunction() {
				window.location.href="<?php echo site_url('home' ); ?>";
			}
			var $ = jQuery.noConflict()
			$( document ).ready(function() {
				scaleVideoContainer();
				initBannerVideoSize('.video-container .poster img');
				initBannerVideoSize('.video-container .filter');
				initBannerVideoSize('.video-container video');
				$(window).on('resize', function() {
					scaleVideoContainer();
					scaleBannerVideoSize('.video-container .poster img');
					scaleBannerVideoSize('.video-container .filter');
					scaleBannerVideoSize('.video-container video');
				});
			});
			function scaleVideoContainer() {
		// window.innerHeight
		var height = window.innerHeight + 5;
		var unitHeight = parseInt(height) + 'px';
		$('.homepage-hero-module').css('height',unitHeight);
	}
	function initBannerVideoSize(element){
		$(element).each(function(){
			$(this).data('height', $(this).height());
			$(this).data('width', $(this).width());
		});
		scaleBannerVideoSize(element);
	}
	function scaleBannerVideoSize(element){
		var windowWidth   = window.innerWidth,
		windowHeight      = window.innerHeight + 5,
		videoWidth,
		videoHeight;
		console.log(windowHeight);
		$(element).each(function(){
			var videoAspectRatio = $(this).data('height')/$(this).data('width');
			$(this).width(windowWidth);
			if(windowWidth < 1000){
				videoHeight = windowHeight;
				videoWidth = videoHeight / videoAspectRatio;
				$(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});
				$(this).width(videoWidth).height(videoHeight);
			}
			$('.homepage-hero-module .video-container video').addClass('fadeIn animated');
		});
	}
</script>
</body>
</html>
