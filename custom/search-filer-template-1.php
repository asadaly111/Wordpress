<?php get_header();

global $wpdb;
$checktitle = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'posts WHERE `post_title` LIKE "%'.$s.'%" AND `post_type` = "property" ');

$checkdeveloper = $wpdb->get_row('
  SELECT * FROM '.$wpdb->prefix.'terms AS `a` INNER JOIN '.$wpdb->prefix.'term_taxonomy AS `b` ON ( `a`.`term_id` = `b`.`term_id` ) WHERE `a`.`name` LIKE "%'.$s.'%" AND `taxonomy` = "developer" LIMIT 1
 ');

$checkdevelopment = $wpdb->get_row('
  SELECT * FROM '.$wpdb->prefix.'terms AS `a` INNER JOIN '.$wpdb->prefix.'term_taxonomy AS `b` ON ( `a`.`term_id` = `b`.`term_id` ) WHERE `a`.`name` LIKE "%'.$s.'%" AND `taxonomy` = "development" LIMIT 1
 ');


$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$s        = @$_GET['s'] != '' ? @$_GET['s'] : '';
$post_type    = @$_GET['post_type'] != '' ? @$_GET['post_type'] : '';

$v_args = array(
  'post_type' => array($post_type),
  'post_status' => array('publish'),
  'paged'       => $paged,
  // 's'       =>  $s,
);
$v_args['tax_query'] = ['relation' => 'OR'];


if ($checktitle) {
  $v_args['s']  = $s;
}



if ($checkdeveloper) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'developer',
    'field'    => 'name',
    'terms'    => $checkdeveloper->name,
    // 'operator ' => 'EXISTS',
  );
}


if ($checkdevelopment) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'development',
    'field'    => 'name',
    'terms'    => $checkdevelopment->name,
    // 'operator ' => 'EXISTS',
  );
}


$vehicleSearchQuery = new WP_Query( $v_args );

?>


<div class="main-contents">
	<h1>LATEST OFF PLAN PROPERTIES</h1>
	<ul class="width-50">
		<?php
		if ($vehicleSearchQuery->have_posts() ) :
			while ($vehicleSearchQuery->have_posts() ) : $vehicleSearchQuery->the_post(); 
				require ULPROURL. '/templates/content.php'; 
			endwhile;
			else: 
				require ULPROURL. '/templates/no-content.php';
			endif; ?>
	</ul>
</div>

<div style="clear: both;"></div>


<?php get_footer();