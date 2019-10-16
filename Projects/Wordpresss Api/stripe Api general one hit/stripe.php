<?php 
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey("sk_test_midHtwu7xhc9SKaY3fwfuVSw");

if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400'); // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS,PUT");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  exit(0);
}
header('Content-Type: application/json');



$postdata = json_decode(file_get_contents('php://input'), true);
if($postdata){
if (!array_key_exists('email', $postdata)){
	http_response_code(404);
	echo json_encode('Email required!');
	die();
}else if (!array_key_exists('amount', $postdata)){
	http_response_code(404);
	echo json_encode('Amount required!');
	die();
}else if (!array_key_exists('card', $postdata)){
	http_response_code(404);
	echo json_encode('Card required!');
	die();
}else if (!array_key_exists('month', $postdata)){
	http_response_code(404);
	echo json_encode('Month required!');
	die();
}else if (!array_key_exists('year', $postdata)){
	http_response_code(404);
	echo json_encode('Year required!');
	die();
}else if (!array_key_exists('cvv', $postdata)){
	http_response_code(404);
	echo json_encode('Cvv required!');
	die();
}else{


$bookEmail = $postdata['email'];
$amount = $postdata['amount'];
$cardno = $postdata['card'];
$month = $postdata['month'];
$year = $postdata['year'];
$cvv = $postdata['cvv'];

try {
	$response = \Stripe\Token::create([
		'card' => [
			'number' => $cardno,
			'exp_month' => $month,
			'exp_year' => $year,
			'cvc' => $cvv
		]
	]);
	$err['status']  = true;
} catch(\Stripe\Error\Card $e) {
    // Since it's a decline, \Stripe\Error\Card will be caught
	$body = $e->getJsonBody();
	$err['error']  = $body['error']['message'];
	$err['status']  = false;
} catch (\Stripe\Error\RateLimit $e) {
	$body = $e->getJsonBody();
	$err['error']  = $body['error']['message'];
	$err['status']  = false;
    // Too many requests made to the API too quickly
} catch (\Stripe\Error\InvalidRequest $e) {
	$body = $e->getJsonBody();
	$err['error']  = $body['error']['message'];
	$err['status']  = false;
    // Invalid parameters were supplied to Stripe's API
} catch (\Stripe\Error\Authentication $e) {
	$body = $e->getJsonBody();
	$err['error']  = $body['error']['message'];
	$err['status']  = false;
    // Authentication with Stripe's API failed
    // (maybe you changed API keys recently)
} catch (\Stripe\Error\ApiConnection $e) {
	$body = $e->getJsonBody();
	$err['error']  = $body['error']['message'];
	$err['status']  = false;
    // Network communication with Stripe failed
} catch (\Stripe\Error\Base $e) {
	$body = $e->getJsonBody();
	$err['error']  = $body['error']['message'];
	$err['status']  = false;
    // Display a very generic error to the user, and maybe send
    // yourself an email
} catch (Exception $e){
	$body = $e->getJsonBody();
	$err['error']  = $body['error']['message'];
	$err['status']  = false;
    // Something else happened, completely unrelated to Stripe
}
if (!$err['status']) {
	print (json_encode(array('code'=>'ERROR', 'error'=> $body['error']['message'])));
	die();
}
try {
	$customer = \Stripe\Customer::create(array(
		'email' => $bookEmail,
		'card'  => $response->id,
	));
	$charge = \Stripe\Charge::create([
		'customer' => $customer->id,
		'amount'   => round($amount * 100),
		'currency' => 'usd',
	]);
	$paymentsstatus['stripe_customer'] = $customer->id;
	$paymentsstatus['status']  = true;
	$paymentsstatus['status']  = 'Transaction has been completed';
} catch(\Stripe\Error\Card $e) {
	$body = $e->getJsonBody();
	$paymentsstatus['error']    = $body['error']['message'];
	$paymentsstatus['status']   = false;
} catch (\Stripe\Error\RateLimit $e) {
	$body = $e->getJsonBody();
	$paymentsstatus['error']    = $body['error']['message'];
	$paymentsstatus['status']   = false;
} catch (\Stripe\Error\InvalidRequest $e) {
	$body = $e->getJsonBody();
	$paymentsstatus['error']  = $body['error']['message'];
	$paymentsstatus['status']  = false;
} catch (\Stripe\Error\Authentication $e) {
	$body = $e->getJsonBody();
	$paymentsstatus['error']  = $body['error']['message'];
	$paymentsstatus['status']  = false;
} catch (\Stripe\Error\ApiConnection $e) {
	$body = $e->getJsonBody();
	$paymentsstatus['error']  = $body['error']['message'];
	$paymentsstatus['status']  = false;
} catch (\Stripe\Error\Base $e) {
	$body = $e->getJsonBody();
	$paymentsstatus['error']  = $body['error']['message'];
	$paymentsstatus['status']  = false;
} catch (Exception $e) {
	$body = $e->getJsonBody();
	$paymentsstatus['error']  = $body['error']['message'];
	$paymentsstatus['status']  = false;
}

if (!$paymentsstatus['status']) {
	print (json_encode(array('code'=>'ERROR', 'error'=> $body['error']['message'])));
}else{
	print(json_encode($paymentsstatus));
}

}


}else{
	print (json_encode(array('code'=>'ERROR', 'error'=> 'Form fields are empty')));
}