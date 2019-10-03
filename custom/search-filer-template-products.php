<?php
/*
* Template Name: Search Products
*/
$s 				= @$_GET['search_city'] != '' ? @$_GET['search_city'] : '';
$post_type 		= 'product';
$model 		= @$_GET['model'] != '' ? @$_GET['model'] : '';
$make 		= @$_GET['make'] != '' ? @$_GET['make'] : '';
$size 		= @$_GET['size'] != '' ? @$_GET['size'] : '';
$v_args = array(
	'post_type' 	=>  $post_type,
	's' 			=>  $s,
);
$v_args['tax_query'] = ['relation' => 'OR'];
if (!empty($_GET['model'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'model',
		'field'    => 'term_id',
		'terms'    => $model,
	);
}
if (!empty($_GET['make'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'make',
		'field'    => 'term_id',
		'terms'    => $make,
	);
}
if (!empty($_GET['size'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'size',
		'field'    => 'term_id',
		'terms'    => $size,
	);
}
$vehicleSearchQuery = new WP_Query( $v_args );
get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
?>
<div class="container-wrap">
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		<div class="row">
			<?php
			//breadcrumbs
			if ( function_exists( 'yoast_breadcrumb' ) && !is_home() && !is_front_page() ){ yoast_breadcrumb('<p id="breadcrumbs">','</p>'); }
			//buddypress
			global $bp;
			if($bp && !bp_is_blog_page()) echo '<h1>' . get_the_title() . '</h1>';
			//fullscreen rows
			if($page_full_screen_rows == 'on') echo '<div id="nectar_fullscreen_rows" data-animation="'.$page_full_screen_rows_animation.'" data-row-bg-animation="'.$page_full_screen_rows_bg_img_animation.'" data-animation-speed="'.$page_full_screen_rows_animation_speed.'" data-content-overflow="'.$page_full_screen_rows_content_overflow.'" data-mobile-disable="'.$page_full_screen_rows_mobile_disable.'" data-dot-navigation="'.$page_full_screen_rows_dot_navigation.'" data-footer="'.$page_full_screen_rows_footer.'" data-anchors="'.$page_full_screen_rows_anchors.'">'; ?>
			



			<div class="woocommerce columns-4">
				<ul class="products columns-4" data-product-style="classic">
					<?php
					if ($vehicleSearchQuery->have_posts() ) :
						while ($vehicleSearchQuery->have_posts() ) : $vehicleSearchQuery->the_post();
							$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium_large', true);
							wc_get_template_part( 'content', 'product' );
							?>
						<?php endwhile; ?>
						<?php else: ?>
							<h2>No result found</h2>
						<?php endif; ?>
					</ul>
				</div>





			<?php if($page_full_screen_rows == 'on') echo '</div>'; ?>
		</div><!--/row-->
	</div><!--/container-->
</div><!--/container-wrap-->
<?php get_footer(); ?>






	