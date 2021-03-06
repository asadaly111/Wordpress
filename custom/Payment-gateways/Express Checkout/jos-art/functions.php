<?php 

include_once("Paypal-Express-Checkout-Example-master/config.php");
include_once("Paypal-Express-Checkout-Example-master/functions.php");
include_once("Paypal-Express-Checkout-Example-master/paypal.class.php");


add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
	
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));

    if ( is_rtl() ) 
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}




function jos_events_post_type() {

	$labels = array(
		'name'               => __( 'Events', 'text-domain' ),
		'singular_name'      => __( 'Event', 'text-domain' ),
		'add_new'            => _x( 'Add New Event', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Event', 'text-domain' ),
		'edit_item'          => __( 'Edit Event', 'text-domain' ),
		'new_item'           => __( 'New Event', 'text-domain' ),
		'view_item'          => __( 'View Event', 'text-domain' ),
		'search_items'       => __( 'Search Event', 'text-domain' ),
		'not_found'          => __( 'No Event found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Events found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Event:', 'text-domain' ),
		'menu_name'          => __( 'Events', 'text-domain' ),
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
		'exclude_from_search' => false,
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
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
	);

	register_post_type( 'Events', $args );
}

add_action( 'init', 'jos_events_post_type' );



// Styling and scripts
add_action('lms_scripts', 'lms_scripts_styles');
function lms_scripts_styles(){
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/bootstrap.css">';
}


add_menu_page( 'Inquries', 'Inquries', 'manage_options', 'cs_inquries', 'cs_inquries');
function cs_inquries(){
	require 'cs_inquries.php';
}



?>