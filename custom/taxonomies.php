<?php 
// show parrent 
$taxonomyName = "category";
$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true) );



// show child
$child_arg = array( 'hide_empty' => false, 'parent' => $_GET['id'] );
$child_cat = get_terms( 'category', $child_arg );


// Get term by id single
$child_arg = get_term_by('id', $_GET['id'], 'category');




// get term by post id 
$developer = wp_get_post_terms( $post->ID, 'developer');
if ($developer):
	foreach ($developer as $developerkey1):
		$content .= '<a href="'.site_url('/location/'.$developer->slug).'">'.$developer->name.'</a>';
	endforeach;
endif;


// Get term meta
$developer_phone = get_term_meta( $developer[0]->term_id, 'developer_phone', true );

// Curent taxnomy OBJECT
$tax = $wp_query->get_queried_object();