<?php 

/**
 * ajax
 */
class cs_ajax{
	
	function __construct(){

		// add_action( "wp_ajax_{$action}", $function_to_add, 10 );
		add_action( "wp_ajax_nopriv_seller_registration", array($this, 'seller_registration'), 10 );
	}


	public function seller_registration(){
		global $wpdb;
		$userdata = array(
			'user_login'  =>  $_POST['username'],
			'user_email' => $_POST['email'],
			'user_pass'   => $_POST['password'],
			'first_name' => $_POST['fname'],
			'last_name' => $_POST['lname'],
		);
		$user_id = wp_insert_user( $userdata );
			add_user_meta( $user_id,'bid_legal_property_name', $_POST['legalname'], false);
			add_user_meta( $user_id,'bid_address', $_POST['address'], false);
			add_user_meta( $user_id,'bid_city', $_POST['city'], false);
			add_user_meta( $user_id,'bid_country', $_POST['country'], false);
			add_user_meta( $user_id,'bid_dob', $_POST['dob'], false);
		$user_role = new WP_User($user_id);
		$user_role->set_role('seller');
		$msg = array(
			'msg' 	=> 'Your account has been created! <a href="'.site_url('/login/').'" style="font-size: 13px;">Login</a>',
			'status' => true,
		);
		print(json_encode($msg));
		exit();
	}

	function general_login(){
		$creds = array();
		$creds['user_login'] = $_POST['username'];
		$creds['user_password'] = $_POST['password'];
		$creds['remember'] = true;
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
				$result['url'] = site_url('');
			}elseif (in_array('seller', $user->roles)) {
				$result['url'] = site_url('/seller/');
			}elseif (in_array('realtor', $user->roles)) {
				$result['url'] = site_url('/realtor/');
			}else{
				$result['url'] = '';
			}
		}
		print_r(json_encode($result));
		exit();
	}



}
new cs_ajax();