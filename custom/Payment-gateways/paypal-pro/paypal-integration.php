<?php 

require 'config.php';

global $api_username, $api_password, $api_signature, $api_version, $api_endpoint, $wpdb;

$exp = explode('/', $_POST['payment']['expiration']);



// Min fields in paypal pro
$request_params = array(
	'METHOD'        => 'DoDirectPayment',
	'USER'          => $api_username,
	'PWD'           => $api_password,
	'SIGNATURE'     => $api_signature,
	'VERSION'       => $api_version,
	'PAYMENTACTION' => 'Sale',
	'IPADDRESS'     => $_SERVER['REMOTE_ADDR'],
	'ACCT'          => $form['payment']['credit-card-number'],
	'EXPDATE'       => $form['payment']['expiration'],
	'CVV2'          => $form['payment']['cvv'],
	'FIRSTNAME'     => $form['first_name'],
	'LASTNAME'      => $form['last_name'],
	'COUNTRYCODE'   => 'AU',
	'AMT'           => $price,
	'CURRENCYCODE'  => 'USD',
	'DESC'          => $service_name,
);




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


	$_POST['paymentstatus'] = $result_array;
	$data = array(
		'fields' 	=> json_encode($_POST), 
		'status' 	=> 'success', 
	);
	$wpdb->insert($wpdb->prefix.'inquiry' , $data);

}