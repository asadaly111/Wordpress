<?php
/**
* Common
*/
class common extends black_dbmanager{

	public function register_user($form = array()){
		

		if (email_exists($form['remail'])) {
			$msg = array('msg' => 'Email Already In Used', 'class' => 'alert alert-danger' );
			print(json_encode($msg));
			exit();
		}
		if (username_exists($form['username'])) {
			$msg = array('msg' => 'Username Already In Used', 'class' => 'alert alert-danger' );
			print(json_encode($msg));
			exit();
		}
		$userdata = array(
			'user_login'  =>  $form['runame'],
			'user_pass'    =>  $form['rpass'],
			'user_email'   =>  $form['remail'],
			'role' => $form['rrole'],
		);
		$user_id = wp_insert_user( $userdata ) ;
		if ($user_id) {
			$postarr = array(
				'post_author' => $user_id,
				'post_title' => $form['rfname'].' '.$form['rlname'],
				'post_status' => 'publish',
				'post_type' => 'services',
			);
			wp_insert_post($postarr);
			$msg = array('msg' => 'User Registerd! <a href='.site_url('/my-account').'>Login</a>', 'class' => 'alert alert-success' );
		}else{
			$msg = array('msg' => 'Something went wrong!', 'class' => 'alert alert-warning' );
		}
		print(json_encode($msg));
	}

	public function black_deactivate_account($form = array()){
		wp_trash_post( $form['post_id']);
		$msg = array('msg' => 'done');
		print(json_encode($msg));
	}


}
$common = new common();