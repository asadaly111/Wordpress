<?php
/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function blackage_services_post_type() {

	$labels = array(
		'name'               => __( 'Services', 'text-domain' ),
		'singular_name'      => __( 'Service', 'text-domain' ),
		'add_new'            => _x( 'Add New Service', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Service', 'text-domain' ),
		'edit_item'          => __( 'Edit Service', 'text-domain' ),
		'new_item'           => __( 'New Service', 'text-domain' ),
		'view_item'          => __( 'View Service', 'text-domain' ),
		'search_items'       => __( 'Search Services', 'text-domain' ),
		'not_found'          => __( 'No Services found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Services found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Service:', 'text-domain' ),
		'menu_name'          => __( 'Services', 'text-domain' ),
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

	register_post_type( 'services', $args );
}

add_action( 'init', 'blackage_services_post_type' );


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
function blackage_services_category() {

	$labels1 = array(
		'name'                  => _x( 'Services Category', 'Taxonomy Services Category', 'text-domain' ),
		'singular_name'         => _x( 'Service Category', 'Taxonomy Service Category', 'text-domain' ),
		'search_items'          => __( 'Search Services Category', 'text-domain' ),
		'popular_items'         => __( 'Popular Services Category', 'text-domain' ),
		'all_items'             => __( 'All Services Category', 'text-domain' ),
		'parent_item'           => __( 'Parent Service Category', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent Service Category', 'text-domain' ),
		'edit_item'             => __( 'Edit Service Category', 'text-domain' ),
		'update_item'           => __( 'Update Service Category', 'text-domain' ),
		'add_new_item'          => __( 'Add New Service Category', 'text-domain' ),
		'new_item_name'         => __( 'New Service Category Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove Services Category', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used Services Category', 'text-domain' ),
		'menu_name'             => __( 'Service Category', 'text-domain' ),
	);

	$args1 = array(
		'labels'            => $labels1,
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

	register_taxonomy( 'services-category', array( 'services' ), $args1 );
}

add_action( 'init', 'blackage_services_category' );


