<?php
/**
* carrier
*/
class carrier extends c3_dbmanager{

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

	public function cms_registrationform($form = array(), $file = array()){
		global $wpdb;
		$userdata = array(
			'display_name'  =>  $_POST['carrier_name'],
			'user_login'  =>  $_POST['UserName'],
			'user_email' => $_POST['email'],
			'user_pass'   => $_POST['Password'],
		);
		$user_id = wp_insert_user( $userdata );
		
		// Set role
		$user_role = new WP_User($user_id);
		$user_role->set_role('carrier');


		if (isset($file['uploadfile'])) {
			$attach_id = insert_attachment('uploadfile', 100);
			update_user_meta( $user_id, 'document_attached', $attach_id);
		}

		update_user_meta( $user_id, 'city_state', $form['city_state']);
		update_user_meta( $user_id, 'comments', $form['comments']);
		update_user_meta( $user_id, 'contact_person', $form['contact_person']);
		update_user_meta( $user_id, 'do_you_have_an_empty_truck', $form['do-you-have-an-empty-truck']);
		update_user_meta( $user_id, 'equipment', $form['equipment']);
		update_user_meta( $user_id, 'is_this_a_customs_broker_request', $form['is-this-a-customs-broker-request']);
		update_user_meta( $user_id, 'mc_number', $form['mc_number']);
		update_user_meta( $user_id, 'phone_number', $form['phone_number']);



$header = "MIME-Version: 1.0" . "\r\n";
$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//get_option('admin_email')
	wp_mail( $_POST['email'] , 'Your account has been created!','<table style="width: 610px; background-color: #fff; display: table; margin: auto;">
	<tbody>
        <tr>
        <td>
            <table style="width: 563px; display: table; margin: 20px auto 0; background-color: #2a2a2a;">
                <tbody>
                    <tr>
                    <td style="width: 50%;  padding: 10px 0 10px 10px;"><a href="index.html"><img style="display: table; margin: 50px auto 50px;" src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/logo.png"></a></td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 563px; display: table; margin: auto; background-color: #f2f2f2;">
                <tbody>
                    <tr>
                    <td style="padding: 70px 0px 70px 0;">
                        <h2 style=" font-size: 20px; color: #4d4d4d; font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;  margin: 0px 0 30px 0; text-align: center; font-weight:600;">Account Info</h2>
                        <p style="font-size: 16px; color: #4d4d4d; font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif; text-align: center; padding: 0 50px 0 50px; margin: 0 0 0 0; line-height: 30px;">Your account has been created!</p>
                    </td>
                    </tr>
                </tbody>
            </table>
	   <table style="width: 563px; display: table; margin: auto;">
                <tbody>
                    <tr style="height: 21.5454px;">
                    <td style="padding: 30px 0px 30px 0px; text-align: center;">
                        <a href="" style="font-size: 25px;color: #135688; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/insta-icon.png"></a>

            	       <a href="" style="font-size: 25px;color: #3f5b98; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/fb-icon.png"></a>

            	       <a href="" style="font-size: 25px;color: #0873b2; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/linkedin-icon.png"></a>

                       <a href="" style="font-size: 25px;color: #22a0f2;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/twitter-icon.png"></a>
                       
                    </td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 563px; display: table; margin: 0 auto 20px; background-color: #ff6712;">
                <tbody>
                    <tr>
                    <td>
                        <h3 style="font-size: 12px; font-weight:lighter; font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif, sans-serif; color: #fff; text-align: center;">Copyrights 2018, Econdir - All rights reserved.</h3>
                    </td>
                    </tr>
                </tbody>
            </table>

        </td>
        </tr>
    </tbody>
</table>' , $header);


	$msg = array(
		'msg' 	=> 'Your account has been created! Kindly login to see your dashboard <a href="'.site_url('/login/').'" style="font-size: 13px;">Login</a>',
		'class' => 'alert alert-success',
	);
	return json_encode($msg);


	}

	public function c3_new_message_send(){
		global $wpdb, $obj;
		$wpdb->insert( $wpdb->prefix.'messages', $_POST);
		$lastid = $wpdb->insert_id;
		$msg = $obj->getRows($wpdb->prefix.'messages', ['where' =>['id' => $lastid  ], 'return_type' => 'single'  ]);
		$msg->userletter = get_user_name_letter($msg->sender_id);
		$msg->date = get_mesg_date($msg->date);
		$msg->username = get_user_name($msg->sender_id);
		return json_encode($msg);
	}



}
$carrier = new carrier();