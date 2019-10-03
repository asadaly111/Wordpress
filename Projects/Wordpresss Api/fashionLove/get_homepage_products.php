<?php
require dirname(dirname(__FILE__)).'/wp-load.php';

if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Max-Age: 86400'); // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS,PUT");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  exit(0);
}

header('Content-Type: application/json');
$q = new WP_Query(
	array(
		'post_type' => array('product'),
		'post_status' => array('publish'),
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 10,
		// 'tag_slug__in' => 'home',
	)
);
while ($q->have_posts()) : $q->the_post();

	$arraya[] = get_the_ID();

	// the_title();

	// if (has_post_thumbnail()):   $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true); 
	// else: 
	// endif
endwhile; 
print_r(json_encode($arraya));



