<?php 
// ajax Lgoin
add_action( 'wp_ajax_cms_loginform', 'cms_loginform' );
add_action( 'wp_ajax_nopriv_cms_loginform', 'cms_loginform' );
function cms_loginform(){
	$creds = array();
	$creds['user_login'] = $_POST['username'];
	$creds['user_password'] = $_POST['password'];
	$creds['remember'] = false;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) ){
		$result['type'] = "error";
		$result['class'] = "alert alert-danger";
		$result['message'] =  $user->get_error_message();
		$result['url'] = '';
	}else{
		$result['type'] = "success";
		$result['class'] = "alert alert-success";
		$result['message'] =  'You are logged in...';
		
		if (in_array('subscriber', $user->roles)) {
			$result['url'] = site_url('/user-dashboard/');
		}elseif (in_array('carrier', $user->roles)) {
			$result['url'] = site_url('/carrier-dashboard/');
		}else{
			$result['url'] = '';
		}
	}
	print_r(json_encode($result));
	exit();
}




// Post a load
add_action( 'wp_ajax_cms_career_registration', 'cms_career_registration' );
add_action( 'wp_ajax_nopriv_cms_career_registration', 'cms_career_registration' );
function cms_career_registration(){
	global $_user;
	print($_user->cms_career_registration($_POST, $_FILES));
	exit();
}



/*************************************/
/*************Normal User*************/
/*************************************/

// Post a load
add_action( 'wp_ajax_cms_postaload', 'cms_postaload' );
add_action( 'wp_ajax_nopriv_cms_postaload', 'cms_postaload' );
function cms_postaload(){
	global $_user;
	print($_user->postaload($_POST));
	exit();
}


// register normal user
add_action( 'wp_ajax_cms_user_registration', 'cms_user_registration' );
add_action( 'wp_ajax_nopriv_cms_user_registration', 'cms_user_registration' );
function cms_user_registration(){
	global $_user;
	print($_user->cms_user_registration($_POST));
	exit();
}


/*************************************/
/*************Carrier Fucntions*************/
/*************************************/

// Post a load
add_action( 'wp_ajax_cms_registrationform', 'cms_registrationform' );
add_action( 'wp_ajax_nopriv_cms_registrationform', 'cms_registrationform' );
function cms_registrationform(){
	global $carrier;
	print($carrier->cms_registrationform($_POST, $_FILES));
	exit();
}


// send_messages to admin
add_action( 'wp_ajax_c3_send_messages', 'c3_send_messages' );
add_action( 'wp_ajax_nopriv_c3_send_messages', 'c3_send_messages' );
function c3_send_messages(){ 
	 global $carrier;
	print($carrier->c3_new_message_send($_POST));
	exit();
}







