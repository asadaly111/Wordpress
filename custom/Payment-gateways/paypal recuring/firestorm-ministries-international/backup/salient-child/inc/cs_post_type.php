<?php 

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function cs_healing_type() {
	$labels = array(
		'name'               => __( 'Healing Post', 'text-domain' ),
		'singular_name'      => __( 'Healing Post', 'text-domain' ),
		'add_new'            => _x( 'Add New Healing Post', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Healing Post', 'text-domain' ),
		'edit_item'          => __( 'Edit Healing Post', 'text-domain' ),
		'new_item'           => __( 'New Healing Post', 'text-domain' ),
		'view_item'          => __( 'View Healing Post', 'text-domain' ),
		'search_items'       => __( 'Search Healing Post', 'text-domain' ),
		'not_found'          => __( 'No Healing Post found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Healing Post found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Healing Post:', 'text-domain' ),
		'menu_name'          => __( 'Healing Post', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
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
	register_post_type( 'healings', $args );
}
add_action( 'init', 'cs_healing_type' );


/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function cs_archive_post() {
	$labels = array(
		'name'               => __( 'Archive Post', 'text-domain' ),
		'singular_name'      => __( 'Archive Post', 'text-domain' ),
		'add_new'            => _x( 'Add New Archive Post', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Archive Post', 'text-domain' ),
		'edit_item'          => __( 'Edit Archive Post', 'text-domain' ),
		'new_item'           => __( 'New Archive Post', 'text-domain' ),
		'view_item'          => __( 'View Archive Post', 'text-domain' ),
		'search_items'       => __( 'Search Archive Post', 'text-domain' ),
		'not_found'          => __( 'No Archive Post found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Archive Post found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Archive Post:', 'text-domain' ),
		'menu_name'          => __( 'Archive Post', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
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

	register_post_type( 'archives', $args );
}
add_action( 'init', 'cs_archive_post' );



function tp_stop_guestes( $content ) {
    global $post;

    if ( $post->post_type == 'healings' || $post->post_type == 'archive') {
        if ( !is_user_logged_in() ) {
            $content = 'Please login to view this post';
        }
    }

    return $content;
}

add_filter( 'the_content', 'tp_stop_guestes' );
