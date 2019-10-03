<?php  

// Restriction for content

function tp_stop_guestes( $content ) {
    global $post;

    if ( $post->post_type == 'courses' ) {
        if ( !is_user_logged_in() ) {
            $content = 'Please login to view this Course <a href="'.site_url('/my-account/').'">Login</a>';
        }
    }

    return $content;
}
add_filter( 'the_content', 'tp_stop_guestes' );