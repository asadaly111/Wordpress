<?php
function cs_checkusername(){
	$username = $_REQUEST['Username'];
	if (username_exists( $username )) {
		echo "false";
	} else {
		echo "true";
	}
	exit();
}
add_action( 'wp_ajax_checkusername', 'cs_checkusername' );
add_action( 'wp_ajax_nopriv_checkusername', 'cs_checkusername' );
function cs_checkemail(){
	$email = $_REQUEST['email'];
	if (email_exists($email)) {
		echo "false";
	} else {
		echo "true";
	}
	exit();
}
add_action( 'wp_ajax_checkemail', 'cs_checkemail' );
add_action( 'wp_ajax_nopriv_checkemail', 'cs_checkemail' );
function CS_form_submit(){
	if (isset($_REQUEST)) {
// $_REQUEST['Username']
// $_REQUEST['email']
// $_REQUEST['Password']
// $_REQUEST['confirm']
// $_REQUEST['name']
// $_REQUEST['age1']27
// $_REQUEST['age2']November  1994-02-23
// $_REQUEST['age3']1926
// $_REQUEST['Country']
// $_REQUEST['City']
// $_REQUEST['gender']
// $_REQUEST['intrested']
// $_REQUEST['status']
		if (!email_exists($_REQUEST['email'])) {
			$userdata = array(
				'user_login'  =>  $_REQUEST['Username'],
				'user_email' => $_REQUEST['email'],
				'user_pass'   => $_REQUEST['Password'],
				'first_name' => $_REQUEST['name'],
				'role' => 'subscriber',
			);
			$user_id = wp_insert_user( $userdata );
			global $wpdb;
			$array1 = array(
'field_id' => 1, //nikname
'user_id' => $user_id,
'value' => $_REQUEST['name'],
);
			$array2 = array(
'field_id' => 2, //birthday
'user_id' => $user_id,
'value' => $_REQUEST['age3'].'-'.$_REQUEST['age2'].'-'.$_REQUEST['age1'],
);
			$array3 = array(
'field_id' => 3, //gender
'user_id' => $user_id,
'value' => $_REQUEST['gender'],
);
			$array4 = array(
'field_id' => 6, //looking
'user_id' => $user_id,
'value' => $_REQUEST['intrested'],
);
			$array5 = array(
'field_id' => 9, //martial status
'user_id' => $user_id,
'value' => $_REQUEST['status'],
);
			$array6 = array(
'field_id' => 17, //city
'user_id' => $user_id,
'value' => $_REQUEST['City'],
);
			$array7 = array(
'field_id' => 18, //country
'user_id' => $user_id,
'value' => $_REQUEST['Country'],
);
			$wpdb->insert( $wpdb->prefix.'bp_xprofile_data', $array1);
			$wpdb->insert( $wpdb->prefix.'bp_xprofile_data', $array2);
			$wpdb->insert( $wpdb->prefix.'bp_xprofile_data', $array3);
			$wpdb->insert( $wpdb->prefix.'bp_xprofile_data', $array4);
			$wpdb->insert( $wpdb->prefix.'bp_xprofile_data', $array5);
			$wpdb->insert( $wpdb->prefix.'bp_xprofile_data', $array6);
			$wpdb->insert( $wpdb->prefix.'bp_xprofile_data', $array7);
			echo "done";
		}
	}
	exit();
}
add_action( 'wp_ajax_formsubmit', 'CS_form_submit' );
add_action( 'wp_ajax_nopriv_formsubmit', 'CS_form_submit' );