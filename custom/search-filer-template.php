<?php 

$s 				= @$_GET['search_city'] != '' ? @$_GET['search_city'] : '';
$post_type 		= @$_GET['type'] != '' ? @$_GET['type'] : '';
$uae_state 		= @$_GET['uae_state'] != '' ? @$_GET['uae_state'] : '';

$property_type 		= @$_GET['property_type'] != '' ? @$_GET['property_type'] : '';
$search_bedrooms 		= @$_GET['search_bedrooms'] != '' ? @$_GET['search_bedrooms'] : '';
$search_developers 		= @$_GET['search_developers'] != '' ? @$_GET['search_developers'] : '';
$search_developments 		= @$_GET['search_developments'] != '' ? @$_GET['search_developments'] : '';
$search_handover 		= @$_GET['search_handover'] != '' ? @$_GET['search_handover'] : '';

$v_args = array(
	'post_type' 	=>  $post_type,
	's' 			=>  $s, 
);

$v_args['tax_query'] = ['relation' => 'OR'];

if (!empty($_GET['uae_state'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'emirates',
		'field'    => 'slug',
		'terms'    => $uae_state,
	);
}


if (!empty($_GET['property_type'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'types',
		'field'    => 'slug',
		'terms'    => $property_type,
	);
}


if (!empty($_GET['search_bedrooms'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'bedroom',
		'field'    => 'slug',
		'terms'    => $search_bedrooms,
	);
}


if (!empty($_GET['search_developers'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'developer',
		'field'    => 'slug',
		'terms'    => $search_developers,
	);
}


if (!empty($_GET['search_developments'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'development',
		'field'    => 'slug',
		'terms'    => $search_developments,
	);
}


if (!empty($_GET['search_handover'])) {
	$v_args['tax_query'][] = array(
		'taxonomy' => 'completion',
		'field'    => 'slug',
		'terms'    => $search_handover,
	);
}




if (!empty($_GET['search_min_price'])) {
	$v_args['meta_query'] = array(
		array(
			'key' => 'cs_price',
			'value' => array( $_GET['search_min_price'], $_GET['search_max_price'] ),
			'type' => 'numeric',
			'compare' => 'BETWEEN'
		)
	);
}


echo "<pre>";
print_r($v_args);
echo "</pre>";

$vehicleSearchQuery = new WP_Query( $v_args );
?>



<?php
if ($vehicleSearchQuery->have_posts() ) :
	while ($vehicleSearchQuery->have_posts() ) : $vehicleSearchQuery->the_post();
		$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium_large', true);
		
		echo get_the_title();
		echo "<br>";

		?>
	<?php endwhile; ?>
	<?php else: ?>
		<h2>No result found</h2>
	<?php endif; ?>
