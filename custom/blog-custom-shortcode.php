<?php 

// Add Shortcode
function custom_blog_posts( $atts ) {
	$atts = shortcode_atts(
		array(
			'posttype' => 'post',
			'count' => 6,
			),
		$atts
		);
	$q = new WP_Query(
		array('post_type' => array($atts['posttype']),
			'post_status' => array('publish'),
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => $atts['count'],
			)
		);
	$content = '';
	while ($q->have_posts()) : $q->the_post();
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
	$content .='
	<div class="vc_col-sm-4">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<div class="img-with-aniamtion-wrap center" data-max-width="100%">
					<div class="inner">
						<a href="'.get_the_permalink().'"><img class="img-with-animation  animated-in" data-delay="0" height="254" width="360" data-animation="grow-in" src="'.$thumbnail[0].'" style="transform: scale(1, 1); opacity: 1;"></a>
					</div>
				</div>
				<div class="divider-wrap">
					<div style="height: 10px;" class="divider">
					</div>
				</div>
				<div class="wpb_text_column wpb_content_element  jul">
					<div class="wpb_wrapper">
						<p><span style="color: #9f2331;">'.get_the_date().'</span></p>
					</div>
				</div>
				<div class="divider-wrap"><div style="height: 10px;" class="divider"></div></div>
				<div class="wpb_text_column wpb_content_element  jul">
					<div class="wpb_wrapper">
						<a href="'.get_the_permalink().'"><h6><span style="color: #272925;">'.get_the_title().'</span></h6></a>
					</div>
				</div>
				<div class="divider-wrap"><div style="height: 10px;" class="divider"></div></div>
				<div class="wpb_text_column wpb_content_element  inter-pp">
					<div class="wpb_wrapper">
						<p>'.substr(wp_strip_all_tags(get_the_content()), 0, 80).'...</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	';
	endwhile;
	return $content;
}

add_shortcode( 'custom_blog_posts', 'custom_blog_posts' );
