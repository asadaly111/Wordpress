<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package actonvideo
 */

get_header('custom'); ?>


<section class="recentpost" style="padding-top: 80px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<img class="center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/404.png" alt="">
				
			</div>
		</div>
	</div>
</section>
					


<?php
get_footer();

?>

