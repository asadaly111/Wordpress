<?
function add_property(){

        $user_id  = get_current_user_id();
        $postarr = array(
            'post_author' => $user_id,
            'post_title' =>  $_POST['Property-Address'],
            'post_content' => $_POST['brief-description'],
            'post_excerpt' => 'publish',
            'post_type' => 'properties',
        );
        $post_id = wp_insert_post($postarr);

        if ($post_id) {
            add_post_meta( $post_id, 'Approximate-square-feet', $_POST['Approximate-square-feet']);
            add_post_meta( $post_id, 'Country', $_POST['Country']);
            add_post_meta( $post_id, 'State', $_POST['State']);
            add_post_meta( $post_id, 'hold-the-bidding', $_POST['hold-the-bidding']);
            add_post_meta( $post_id, 'Time-frame', $_POST['Time-frame']);
            add_post_meta( $post_id, 'Year-build', $_POST['Year-build']);
            add_post_meta( $post_id, 'Property-owner-Email-Address', $_POST['Property-owner-Email-Address']);
            add_post_meta( $post_id, 'Zip-Code', $_POST['Zip-Code']);
            add_post_meta( $post_id, 'Expected-Sale-Price', $_POST['Expected-Sale-Price']);
            add_post_meta( $post_id, 'Legal-Property-owner-Name', $_POST['Legal-Property-owner-Name']);
            add_post_meta( $post_id, 'Mailling-Address-If-Different', $_POST['Mailling-Address-If-Different']);
            add_post_meta( $post_id, 'Phone-Number', $_POST['Phone-Number']);
            add_post_meta( $post_id, 'Preference-esate-agent', $_POST['Preference-esate-agent']);
            $attach_id = insert_attachment('photos',  $post_id);
            update_post_meta($post_id, '_thumbnail_id', $attach_id);
        }

        $response = array(
            'status' => true, 
            'msg' => 'Your property has been published!', 
        );
        print_r(json_encode($response));
        exit();
}




$args = array(
  'p'         => 6448, // ID of a page, post, or custom type
  'post_type' => 'any' //any keyword is for any post type
);
$my_posts = new WP_Query($args);
while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
	<?php wc_get_template_part( 'content', 'single-product' ); ?>
<?php endwhile; // end of the loop. ?>


<?php
$q = new WP_Query(
array(
    'post_type' => array('slider'),
    'post_status' => array('publish'),
    'orderby' => 'date',
    'order' => 'DESC',
    'author'        =>  $current_user->ID,
    'posts_per_page' => 'no Of post',
    'tag_slug__in' => 'home',
    'category_name' => 'favourite',
    'taxonomy_name' => 'taxonomy'
    )
);
?>
<?php while ($q->have_posts()) : $q->the_post(); ?>
    <?php if (has_post_thumbnail()):   $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true); ?>
    <?php else: ?>
    <?php endif ?>
<?php endwhile; ?>



<!-- //Category Fetch Loop -->
<?php  
$args = array(
    'orderby' => 'id',
    'hide_empty'=> 0,
    );
$categories = get_categories($args); ?>
<?php foreach ($categories as $cat): ?>
    <p class="tag"><a href="<?php echo site_url(); ?>/category/<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a></p>
<?php endforeach ?>


<!-- //specific page loop -->
<?php $my_query = new WP_Query('page_id=87');
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php endwhile; ?>

<!-- //Menu Print li a -->
<?php 
$primaryMenu = array(
    'theme_location'  => 'bottom',
    'menu'            => '',
    'container'       => '',
    'container_class' => false,
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => 'primary-menu',
    'echo'            => false,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'depth'           => 0,
    'walker'          => ''
);
echo strip_tags( wp_nav_menu( $primaryMenu ), '<li><a>' );
 ?>

<!-- Adding Different Sizes of Pics according to post type - Adding image sizes  -->
<?php 
add_filter( 'intermediate_image_sizes_advanced','set_thumbnail_size_by_post_type', 10);
function set_thumbnail_size_by_post_type( $sizes ) {
    $post_type = get_post_type($_REQUEST['post_id']);
    switch ($post_type) :
        case 'testimonials' :
            $sizes['service'] = array( 
                'width' => 250,
                'height' => 155,
                'crop' => true
            );    
            $sizes['servicea'] = array( 
                'width' => 30,
                'height' => 30,
                'crop' => true
            );              
        break;
        case 'post' :
            $sizes['post'] = array( 
                'width' => 250,
                'height' => 210,
                'crop' => true
            );
        break;
        default :
            $sizes['default'] = array( 
                'width' => 200,
                'height' => 200,
                'crop' => true
            );
    endswitch;
    return $sizes;
}
?>

<!-- SHow taxonomy in custom post type loop  -->
<?php
$var = get_the_terms( $post->ID, 'taxonomy' );
    foreach( $var as $category ) {
        $cat[] = array(
        'catname' => $category->slug
        );
    }
?>

<!-- Related Post  -->
<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_terms($post->ID , 'portfolio-category'); //second parameter for taxonomies
if ($tags) {
echo 'Related Posts';
$first_tag = $tags[0]->name;
$args=array(
'portfolio-category' => $first_tag,
'post__not_in' => array($post->ID),
'posts_per_page'=>5,
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

<?php
endwhile;
}
wp_reset_query();
}
?>
<!-- Ends here -->



<!--Check image sizes and display  -->
<?php 
$var = wp_get_attachment_metadata(get_post_thumbnail_id());
echo "<pre>";
print_r($var);

wp_get_attachment_image_src(get_post_thumbnail_id(),'thumbnail', true);





