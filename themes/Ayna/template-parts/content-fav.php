<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package actonvideo
 */

?>
<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'favpost' );
$var  = get_the_category(); ?>
<div class="item" id="post-<?php the_ID(); ?>">
	<div class="item-outer">
		<div class="favourite-thumbnail"><a href="<?php the_permalink(); ?>" style="background:url(<?php echo $image[0] ?>) no-repeat center center;background-size: cover"></a></div>
		<a class="favourite-categorys mag-cat" href="<?php the_permalink(); ?>"><?php echo $var[0]->name; ?></a>
		<div class="favourite-posts-overlay">
			<h1 class="favourite-posts-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		</div>
	</div>
</div>
