<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package actonvideo
 */

?>
<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'mainthumb' );  
	if (!empty($image)) {
		$image = $image[0];
	}else{
		$image = 'http://via.placeholder.com/330x220';
	}

?>
<div class="posts" id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="col-md-5">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $image; ?>" alt=""></a>
		</div>
		<div class="col-md-7">
			<h3><?php echo substr(wp_strip_all_tags(get_the_title()), 0 , 67); ?>...</h3>
			<hr>
			<p class="date"><?php echo  get_the_date(); ?></p>
			<p><?php echo substr(wp_strip_all_tags(get_the_content()), 0 , 287); ?>....<a href="<?php the_permalink(); ?>">[...]</a></p>
		</div>
	</div>
</div>

