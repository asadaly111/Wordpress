<?php
// paypal
require 'config.php';
// main class
require 'main_class.php';

// post type
require 'cs_post_type.php';

// Backend Menu Page
require 'cs_menupage.php';



if (!empty($_GET['token']) && !empty($_GET['PayerID'])) {


	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_URL, 'https://api-3t.paypal.com/nvp');
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
		'USER' => 'FSFirestorm4U-facilitator_api1.aol.com',
		'PWD' => 'B6DCHCSQLA4DSMAQ',
		'SIGNATURE' => 'Ab7PCDZsSdsHeHmZMMPifgy9dY.QAMVaODJPXKqSoe5skGLtSKSDK6uZ',
		'METHOD' => 'CreateRecurringPaymentsProfile',
		'VERSION' => '108',
		'LOCALECODE' => 'en_US',
		'TOKEN' => $_GET['token'],
		'PayerID' => $_GET['PayerID'],
		'PROFILESTARTDATE' => date("Y-m-d").'T15:00:00Z',
		'DESC' => 'Exemplo',
		'BILLINGPERIOD' => 'Month',
		'BILLINGFREQUENCY' => '1',
		'AMT' => 100,
		'CURRENCYCODE' => 'USD',
		'COUNTRYCODE' => 'US',
		'MAXFAILEDPAYMENTS' => 3
	)));
	$response =    curl_exec($curl);
	curl_close($curl);
	$nvp = array();
	if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
		foreach ($matches['name'] as $offset => $name) {
			$nvp[$name] = urldecode($matches['value'][$offset]);
		}
	}

	if ($nvp['ACK'] == 'Success') {
		$user_id = $_GET['id'];

		$start 	= date("Y-m-d");
		$time 	= strtotime($start);
		$final 	= date("Y-m-d", strtotime("+1 month", $time));

		$data = array(
			'token' => $_GET['token'], 
			'PayerID' => $_GET['PayerID'], 
			'PROFILEID' => $nvp['PROFILEID'], 
			'CORRELATIONID' => $nvp['CORRELATIONID'], 
			'status' => 'active', 
			'payment_start_date'=> $start,
			'payment_end_date' 	=> $final,			
		);
		$wpdb->update($wpdb->prefix.'payments', $data, ['user_id' => $user_id ]);
		echo '<script>window.location = "'.site_url('/create-your-account/?msg=1').'";</script>';
		exit();
	}else{
		echo '<script>window.location = "'.site_url('/create-your-account/?msg=2').'";</script>';
		exit();
	}
}



// Restrict page for users for recuring payment - later will update this function according to payment scedule...
add_action('template_redirect','my_non_logged_redirect');
function my_non_logged_redirect(){
	if (is_page(array( 'archive-page', 'healing')) && !is_user_logged_in() ){
		wp_redirect( home_url() );
		die();
	}
}



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
		$result['status'] = false;
		$result['class'] = "alert alert-danger";
		$result['message'] =  $user->get_error_message();
		$result['url'] = '';
	}else{
		$result['status'] = true;
		$result['class'] = "alert alert-success";
		$result['message'] =  'You are logged in...';
		$result['url'] = '/my-account/';
		
	}
	print_r(json_encode($result));
	exit();
}

/*
*
*  'type' => true >>>> Recuring
*  'type' => false >>>> Onetime
*
*/ 

add_action( 'wp_ajax_cms_formsubmit', 'cms_formsubmit' );
add_action( 'wp_ajax_nopriv_cms_formsubmit', 'cms_formsubmit' );
function cms_formsubmit(){
	global $api_username, $api_password, $api_signature, $api_version, $api_endpoint, $wpdb;
	
	switch ($_POST['payment_method']) {
		case 'onetime':

		$request_params = array(
			'METHOD'        => 'DoDirectPayment',
			'USER'          => $api_username,
			'PWD'           => $api_password,
			'SIGNATURE'     => $api_signature,
			'VERSION'       => $api_version,
			'PAYMENTACTION' => 'Sale',
			'IPADDRESS'     => $_SERVER['REMOTE_ADDR'],
			'ACCT'          => $_POST['payment']['card_number'],
			'EXPDATE'       => $_POST['payment']['month'].$_POST['payment']['year'],
			'CVV2'          => $_POST['payment']['cvv'],
			'FIRSTNAME'     => $_POST['first_name'],
			'LASTNAME'      => $_POST['last_name'],
			'COUNTRYCODE'   => 'US',
			'AMT'           => 100,
			'CURRENCYCODE'  => 'USD',
			'DESC'          => 'Testing product!',
		);
		$nvp_string = '';
		foreach($request_params as $var=>$val){
			$nvp_string .= '&'.$var.'='.urlencode($val);
		}
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_URL, $api_endpoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
		$result = curl_exec($curl);
		curl_close($curl);
		$result_array = NVPToArray($result);
		if ($result_array['ACK'] == 'Success') {
			unset($_POST['payment']);
			$payment = array(
				'TRANSACTIONID' => $result_array['TRANSACTIONID'], 
				'CORRELATIONID' => $result_array['CORRELATIONID'], 
				'type' => 'ontime', 
				'status' => 'active', 
				'data' => json_encode($_POST), 
				);
			$wpdb->insert( $wpdb->prefix.'payments', $payment);
			$msg = array('status' => true, 'type' => false,  'msg' => 'You reqest has been submited!', 'msg2' => $result_array );
		}else{
			$msg = array('status' => false, 'type' => false, 'msg' => $result_array );
		}
		print(json_encode($msg));
		break;

		case 'recuring':

		global $wpdb;
		$userdata = array(
			'first_name'  =>  $_POST['first_name'],
			'last_name'  =>  $_POST['last_name'],
			'user_login'  =>  $_POST['email'],
			'user_email' => $_POST['email'],
			'user_pass'   => $_POST['password'],
		);
		$user_id = wp_insert_user( $userdata );
		// Set role
		$user_role = new WP_User($user_id);
		$user_role->set_role('subscriber');

		

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_URL, 'https://api-3t.paypal.com/nvp');
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
			'USER' => 'FSFirestorm4U-facilitator_api1.aol.com',
			'PWD' => 'B6DCHCSQLA4DSMAQ',
			'SIGNATURE' => 'Ab7PCDZsSdsHeHmZMMPifgy9dY.QAMVaODJPXKqSoe5skGLtSKSDK6uZ',
			'METHOD' => 'SetExpressCheckout',
			'VERSION' => '108',
			'LOCALECODE' => 'en_US',
			'PAYMENTREQUEST_0_AMT' => 100,
			'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
			'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
			'PAYMENTREQUEST_0_ITEMAMT' => 100,
			'L_PAYMENTREQUEST_0_NAME0' => 'Exemplo',
			'L_PAYMENTREQUEST_0_DESC0' => 'Assinatura de exemplo',
			'L_PAYMENTREQUEST_0_QTY0' => 1,
			'L_PAYMENTREQUEST_0_AMT0' => 100,
			'L_BILLINGTYPE0' => 'RecurringPayments',
			'L_BILLINGAGREEMENTDESCRIPTION0' => 'Exemplo',
			'CANCELURL' => site_url('/create-your-account/?cancel=true'),
			'RETURNURL' => site_url('/create-your-account/?id='.$user_id),
		)));
		$response =    curl_exec($curl);
		curl_close($curl);
		$nvp = array();
		if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
			foreach ($matches['name'] as $offset => $name) {
				$nvp[$name] = urldecode($matches['value'][$offset]);
			}
		}
		if (isset($nvp['ACK']) && $nvp['ACK'] == 'Success') {
			$query = array(
				'cmd'    => '_express-checkout',
				'token'  => $nvp['TOKEN']
			);
			$redirectURL = sprintf('https://www.sandbox.paypal.com/cgi-bin/webscr?%s', http_build_query($query));

			unset($_POST['payment']);
			$payment = array(
			'user_id' 	=> $user_id,
			'type' 		=> 'recuring',
			'status' 	=> 'inactive',
			'cycle' 	=> 'monthly',
			'data' 		=> json_encode($_POST),
			);
			$wpdb->insert( $wpdb->prefix.'payments', $payment);
			$msg = array('status' => true,  'type' => true, 'url' => $redirectURL, 'msg' => 'You are successfully subscribed monthly!' );

		} else {

			$msg = array('status' => false, 'type' => false, 'msg' => 'something went wrong!' );

		}

		print_r(json_encode($msg));
		break;

		default:
		$msg = array('status' => false, 'type' => false, 'msg' => 'something went wrong!' );
		print_r(json_encode($msg));
		break;
	}
	exit();
}

// Event triggers
add_action( 'wp_ajax_paypal_recuring', 'paypal_recuring' );
add_action( 'wp_ajax_nopriv_paypal_recuring', 'paypal_recuring' );
function paypal_recuring(){
	global $wpdb, $obj;


	$jsondata = file_get_contents("php://input");
	$dd = json_decode( $jsondata, true);

	$profileid = $dd['resource']['id'];
	$payerid  = $dd['resource']['payer']['payer_info']['payer_id'];

	$existing = $obj->getRows($wpdb->prefix.'payments', ['where' =>['PROFILEID' => $profileid ], 'return_type' => 'single', 'limit' => 1, 'order_by' => 'id desc' ]);
	
	$start 	= date("Y-m-d");
	$time 	= strtotime($existing->payment_start_date);
	$final 	= date("Y-m-d", strtotime("+1 month", $time));

	if ($dd['event_type'] == 'BILLING.SUBSCRIPTION.UPDATED') {
		$payment = array(
			'user_id' 			=> $existing->user_id,
			'type' 				=> 'recuring',
			'status' 			=> 'active',
			'cycle' 			=> 'monthly',
			'PayerID' 			=> $existing->PayerID,
			'PROFILEID' 		=> $existing->PROFILEID,
			'data' 				=> $existing->data,
			'payment_start_date'=> $start,
			'payment_end_date' 	=> $final,
		);
		$wpdb->insert( $wpdb->prefix.'payments', $payment);
	}
	if ($dd['event_type'] == 'BILLING.SUBSCRIPTION.SUSPENDED') {
		$wpdb->update( $wpdb->prefix.'payments', ['status' => 'inactive' ] , ['id' => $existing->id ]);
	}
	exit();
}



// Page validation:

function check_page_restrictions(){
	global $wpdb, $obj;
	$user_id  = get_current_user_id();

	// For specific role
	$current_user = wp_get_current_user();
	if (in_array('administrator', $current_user->roles)) {
		return false;
	}
	
	$existing = $obj->getRows($wpdb->prefix.'payments', ['where' =>['user_id' => $user_id ], 'return_type' => 'single', 'limit' => 1, 'order_by' => 'id desc' ]);
	if (!empty($existing)):
		if ($existing->status != 'active'):
			echo "Your subscription has been expired!";
			die();
		endif; 
	else:
		echo "You cannot access this page. You don't have subscription.";
		die();
	endif;
}