<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package actonvideo
 */

?>
<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'sliderbig' );
$var  = get_the_category(); ?>
<div class="item">
	<div class="item-outer">
		<div class="intro-thumbnail">
			<a href="<?php the_permalink(); ?>" style="background:url(<?php echo $image[0] ?>) no-repeat center center;background-size: cover">
			</a>
		</div>
		<div class="intro-posts-overlay">
			<a class="category mag-cat" href="#"><?php echo $var[0]->name; ?></a>
			<h1 class="intro-posts-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
			<ul class="post-feed-meta-intro">
				<li class="post-feed-author-intro">Admin</li>
				<li class="post-feed-date-intro"><?php echo  get_the_date(); ?></li>
			</ul>
		</div>
	</div>
</div>
