<?php 

add_action('wp_enqueue_scripts', 'enqueue_scripts_cs');
function enqueue_scripts_cs() {

	wp_enqueue_script('js1', get_stylesheet_directory_uri().'/custom/jquery.steps.min.js', array('jquery'), '1.1', true);
	wp_enqueue_script('js2', get_stylesheet_directory_uri().'/custom/jquery.validate.min.js', array('jquery'), '1.1', true);
	wp_enqueue_script('js3', get_stylesheet_directory_uri().'/custom/sweetalert.min.js', array('jquery'), '1.1', true);
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri().'/custom/custom.js', array('jquery'), '1.1', true);


	global $wpdb,$obj;
	$main = $obj->getRows($wpdb->prefix.'camps');
	$i = 0;
	foreach ($main as $key) {
		$subdata1[$key->id] = $obj->getRows($wpdb->prefix.'services', ['where' =>['campid' => $key->id ] ]);
	}
	wp_localize_script('custom-js', 'cs_object',
		array(
			'mainservice' => $main,
			'subservice' =>$subdata1,
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}




add_action('wp_enqueue_scripts', 'enqueue_scripts_cs');
function enqueue_scripts_cs() {

	$curency = get_option( 'get_currencies');
	$curency = json_decode( $curency, true);

	wp_enqueue_script('custom-js', get_stylesheet_directory_uri().'/custom.js', array('jquery'), '1.1', true);
	wp_localize_script('custom-js', 'cs_object',
		array(
			'currencies' => $curency,
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}