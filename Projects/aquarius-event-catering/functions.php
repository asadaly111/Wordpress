<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
	
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));

	if ( is_rtl() ) 
		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}



// payment gateway
require 'pay/includes/config.php';
add_action( 'wp_ajax_cms_formsubmit', 'cms_formsubmit' );
add_action( 'wp_ajax_nopriv_cms_formsubmit', 'cms_formsubmit' );
function cms_formsubmit(){

	global $api_username, $api_password, $api_signature, $api_version, $api_endpoint, $wpdb;

	$exp = explode('/', $_POST['payment']['expiration']);

	$request_params = array(
		'METHOD'        => 'DoDirectPayment',
		'USER'          => $api_username,
		'PWD'           => $api_password,
		'SIGNATURE'     => $api_signature,
		'VERSION'       => $api_version,
		'PAYMENTACTION' => 'Sale',
		'IPADDRESS'     => $_SERVER['REMOTE_ADDR'],
		'ACCT'          => $_POST['payment']['credit-card-number'],
		'EXPDATE'       => $exp[0].$exp[1],
		'CVV2'          => $_POST['payment']['cvv'],
		'FIRSTNAME'     => $_POST['billing_details_form']['first_name'],
		'LASTNAME'      => $_POST['billing_details_form']['last_name'],
		'STREET'        => $_POST['billing_details_form']['address'],
		'CITY'          => $_POST['billing_details_form']['city'],
		'STATE'         => $_POST['billing_details_form']['region'],
		'COUNTRYCODE'   => $_POST['billing_details_form']['country_code'],
		'ZIP'           => $_POST['billing_details_form']['zipcode'],
		'AMT'           => $_POST['payment']['amount'],
		'CURRENCYCODE'  => 'USD',
		'DESC'          => $_POST['payment']['item'],
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


		unset($_POST['payment']['credit-card-number'], $_POST['payment']['expiration'],$_POST['payment']['cvv']);

		$_POST['paymentstatus'] = $result_array;
		$data = array(
			'fields' 	=> json_encode($_POST), 
			'status' 	=> 'success', 
		);
		$wpdb->insert($wpdb->prefix.'inquiry' , $data);

$message = '
Thank you for making the purchase, one of our representative will get in touch with you shortly.
';
$message1 = '
You have got one new purchase notification... 
';
		wp_mail( $_POST['billing_details_form']['email'], 'Purchase Update', $message);
		wp_mail( get_option('admin_email'), 'Good News! New Order received', $message1);
	 	$msg = array('class' => 'alert alert-success', 'msg' => 'Thank you for making the purchase...', 'status' => $result_array );
	}else{
		$msg = array('class' => 'alert alert-danger', 'msg' => 'Transaction has been failed!', 'status' => $result_array );
	}

	$msg = json_encode($msg);
	print($msg);
	exit();
}
// Ends here



// Styling and scripts
add_action('lms_scripts', 'lms_scripts_styles');
function lms_scripts_styles(){
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/bootstrap.css">';
}


add_menu_page( 'Inquries', 'Inquries', 'manage_options', 'cs_inquries', 'cs_inquries');
function cs_inquries(){
	require 'cs_inquries.php';
}






?>