<?php 
class commonuser extends c3_dbmanager{

	// Post A load
	public function postaload($form = array()){
		if (!is_user_logged_in()) {
			$result['type'] = 'error';
			$result['class'] = 'alert alert-danger';
			$result['message'] =  'Please login first!';
			return json_encode($result);
		}else{
			$user_id  = get_current_user_id();
			$post = array(
				'post_author' => $user_id,
				'post_content' => $form['discription'],
				'post_status' => 'pending',
				'post_title' => $form['Origin-State'].' '.$form['Origin-City'],
				'post_type' => "truck_load",
			);
			$post_id = wp_insert_post( $post);
			update_post_meta( $post_id, 'load_origin_city', $form['Origin-City'] );
			update_post_meta( $post_id, 'load_origin_state', $form['Origin-State']);
			update_post_meta( $post_id, 'load_destination_city', $form['Destination-City']);
			update_post_meta( $post_id, 'load_destination_state', $form['Destination-State'] );
			update_post_meta( $post_id, 'Pick_up_Date', $form['Pick-up-Date'] );
			update_post_meta( $post_id, 'Delivery_Drop_off_Date', $form['Delivery-Drop-off-Date'] );
			update_post_meta( $post_id, 'Delivery_Drop_off_Date', $form['Weight'] );
			unset($form['Origin-State'],$form['Origin-City'],$form['Destination-State'],$form['Destination-City'],$form['Pick-up-Date'],$form['Delivery-Drop-off-Date'], $form['discription'], $form['Weight']);
			update_post_meta( $post_id, 'load_restinfo', $form);
			$result['type'] = 'success';
			$result['class'] = 'alert alert-success';
			$result['message'] =  'Your request has been submited for admin aproval...';
			return json_encode($result);
		}
	}



	public function cms_career_registration( $form = array() , $file = array() ){
		global $wpdb;
		if (isset($file['file'])) {
			$attach_id = insert_attachment('file', 100);
		}
		$postData = array(
			'first_name' => $form['First_Name'],
			'last_name' => $form['Last_Name'],
			'email' => $form['Email'],
			'location' => $form['Location'],
			'city' => $form['City'],
			'intrest_level' => $form['Interest_Level'],
			'existing_customer' => $form['Do_you_have_an_existing_customer_Base'],
			'resume' => $attach_id,
			'status' => 'new',
		);
		$wpdb->insert( $wpdb->prefix.'careers', $postData);
		$result['type'] = 'success';
		$result['class'] = 'alert alert-success';
		$result['message'] =  'Your request has been submited....';
		return json_encode($result);
	}


	public function cms_user_registration($form = array()){
		global $wpdb;
		$userdata = array(
			'first_name'  =>  $form['First_Name'],
			'last_name'  =>  $form['Last_Name'],
			'user_login'  =>  $form['Username'],
			'user_email' => $form['Email'],
			'user_pass'   => $form['password'],
		);
		$user_id = wp_insert_user( $userdata );
		// Set role
		$user_role = new WP_User($user_id);
		$user_role->set_role('subscriber');
		$result['type'] = 'success';
		$result['class'] = 'alert alert-success';
		$result['message'] =  'Your request has been submited....';
		return json_encode($result);
	}








}//Class end here
$_user = new commonuser();

// if (is_user_logged_in()) {
// 	$postarr = array(
// 		'post_author' => $user_id,
// 		'post_title' => $form['profile_name'],
// 		'post_status' => 'publish',
// 		'post_type' => 'services',
// 	);
// 	wp_insert_post($postarr);
// 	$msg = array('msg' => 'New Profile has been added!', 'class' => 'alert alert-success' );
// }else{
// 	$msg = array('msg' => 'Please login first from agency account...', 'class' => 'alert alert-danger' );
// }
// return json_encode($msg);