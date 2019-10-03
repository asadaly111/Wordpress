<?php 



/**

 * Activations

 */

class agency extends black_dbmanager{

	
	public function black_add_new_profile($form = array()){
		$user_id  = get_current_user_id();
		if (is_user_logged_in()) {
			$postarr = array(
				'post_author' => $user_id,
				'post_title' => $form['profile_name'],
				'post_status' => 'publish',
				'post_type' => 'services',
			);
			wp_insert_post($postarr);
			$msg = array('msg' => 'New Profile has been added!', 'class' => 'alert alert-success' );
		}else{

			$msg = array('msg' => 'Please login first from agency account...', 'class' => 'alert alert-danger' );
		}
		return json_encode($msg);
	}
	

	



	

}



$agency = new agency();