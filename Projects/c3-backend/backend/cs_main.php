<?php 
// Classes
require 'class/main_class.php';
require 'class/class_carrier.php';
require 'class/class_common_user.php';
// AJax requests
require 'cs_ajax.php';

// For specific role
$current_user = wp_get_current_user();


add_role('carrier', 'Carrier', array('read'=> true));	
// Remove toolbar from every user
add_filter('show_admin_bar', '__return_false');


// Restrict page for users
add_action('template_redirect','my_non_logged_redirect');
function my_non_logged_redirect(){
	$current_user = wp_get_current_user();
	if (is_page(array( 'user-dashboard', 'listing', 'post-load' )) && !is_user_logged_in()){
		wp_redirect( home_url() );
		die();
	}
	if (is_page(array( 'user-dashboard', 'listing', 'post-load' )) && in_array('subscriber', $current_user->roles) == false) {
		wp_redirect( home_url() );
		die();
	}


	if (is_page(array( 'carrier-dashboard', 'discussion', 'find-a-load' )) && !is_user_logged_in()){
		wp_redirect( home_url() );
		die();
	}
	if (is_page(array( 'carrier-dashboard', 'discussion', 'find-a-load'  )) && in_array('carrier', $current_user->roles) == false) {
		wp_redirect( home_url() );
		die();
	}

}




/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function cs_truck_load() {

	$labels = array(
		'name'               => __( 'Truck Loads', 'text-domain' ),
		'singular_name'      => __( 'Truck Load', 'text-domain' ),
		'add_new'            => _x( 'Add New Truck Load', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Truck Load', 'text-domain' ),
		'edit_item'          => __( 'Edit Truck Load', 'text-domain' ),
		'new_item'           => __( 'New Truck Load', 'text-domain' ),
		'view_item'          => __( 'View Truck Load', 'text-domain' ),
		'search_items'       => __( 'Search Truck Loads', 'text-domain' ),
		'not_found'          => __( 'No Truck Loads found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Truck Loads found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Truck Load:', 'text-domain' ),
		'menu_name'          => __( 'Truck Loads', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => true,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
		),
	);

	register_post_type( 'truck_load', $args );
}

add_action( 'init', 'cs_truck_load' );




// Styling and scripts
add_action('c3_scripts', 'c3_scripts_styles');
function c3_scripts_styles(){
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/backend/css/bootstrap.css">';
}


function c3_conversation(){
	add_submenu_page( 'edit.php?post_type=truck_load', 'Messages', 'Messages', 'manage_options', 'messages', 'c3_messages' );
	add_submenu_page( 'edit.php?post_type=truck_load', 'Career', 'Career', 'manage_options', 'career', 'c3_career' );
	function c3_messages(){
		require 'pages/cs_messages.php';
	}
	function c3_career(){
		require 'pages/cs_career.php';
	}
}
add_action( 'admin_menu', 'c3_conversation');



if (!function_exists('insert_attachment')) {
	function insert_attachment($file_handler, $post_id, $setthumb=false) {

		if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) {
			return __return_false();
		}
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
		$attach_id = media_handle_upload( $file_handler, $post_id );
		return $attach_id;
	}
}

