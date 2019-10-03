<?php 

// Restrict page for users
add_action('template_redirect','my_non_logged_redirect');
function my_non_logged_redirect(){
	if ((is_page('dashboard') || is_page('agregar-empresa')) && !is_user_logged_in() ){
		wp_redirect( home_url() );
		die();
	}
}
