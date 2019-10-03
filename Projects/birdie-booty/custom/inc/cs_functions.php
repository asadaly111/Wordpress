<?php
// Styling and scripts
add_action('booking_script_css', 'booking_script_css_styles');
function booking_script_css_styles(){
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/custom/bootstrap.css">';
	echo '<link href="'.get_stylesheet_directory_uri().'/custom/featherlight/featherlight.min.css" type="text/css" rel="stylesheet" />';
	echo '<script src="'.get_stylesheet_directory_uri().'/custom/featherlight/featherlight.min.js" type="text/javascript" charset="utf-8"></script>';
}



add_menu_page( 'Subscriptions', 'Subscriptions', 'manage_options', 'booking_appointments', 'booking_subscriptions_function' );
function booking_subscriptions_function(){require 'backend/cs_entries.php';}

// Ajax
function insert_student($form = array()){
	global $wpdb;

	$subscriptionparse = array(
		'first_name' => $form['first_name'], 
		'last_name' => $form['last_name'], 
		'email' => $form['email'], 
		'stripeToken' => $form['stripeToken'], 
		'package' => $form['subscription_id'], 
		'amount' => get_subscription_amount_by_id($form['subscription']['subscription']), 
	);


	if (!empty($form['subscription_id'])) {
		$status = stripe_payment_gateway($subscriptionparse);
	} else {
		$status = stripe_payment_gateway($subscriptionparse, false);
	}


	if ($status['status'] == false) {
		return json_encode($status);		
	}

	// if shipping detals is same
	if (!empty($form['shipingcheck'])) {
		$shipping = json_encode($form['shipping'])
	}else{
		$shipping = json_encode(['shipping_details' => 'Same as billing Address'])
	}

	$data = array(
		'stripe_cus_id' => $status['stripe_customer'], 
		'first_name' => $form['first_name'], 
		'last_name' => $form['last_name'], 
		'email' => $form['email'], 
		'street_address' => $form['address'], 
		// 'apt' => $form['street_address'], 
		'city' => $_POST['city'], 
		'state' => $_POST['region'], 
		'zip' => $_POST['zipcode'], 
		'country' => $_POST['country_code'], 
		'size' => $form['subscription']['size'], 
		'subscription' => $form['subscription']['subscription'], 
		'status' => 'active', 
		'shipping' => $shipping,
	);
	$wpdb->insert( $wpdb->prefix.'bird_booking_subscription', $data);
	$lastid = $wpdb->insert_id;
	$payment = array(
		'booking_subscription' => $lastid, 
		'stripe_sub_id' => $status['stripe_subscription'], 
		'paid' => get_subscription_amount_by_id($form['subscription']['subscription']), 
		'status' => 'paid', 
	);
	$wpdb->insert( $wpdb->prefix.'bird_payment', $payment);
	$status['msg'] = 'You have successfully subscribed! Thankyou';
	return json_encode($status);		
}




add_action( 'wp_ajax_cms_formsubmit', 'cms_formsubmit' );
add_action( 'wp_ajax_nopriv_cms_formsubmit', 'cms_formsubmit' );
function cms_formsubmit(){
	global $wpdb;
	print(insert_student($_POST));
	exit();
}



function stripe_payment_gateway($form = array(), $subscription= true){
	\Stripe\Stripe::setApiKey("sk_test_zT7p498OM68jtcu35gHmiElm");
	if ($subscription) {
		try {
			$customer = \Stripe\Customer::create(array(
				'email' => $form['email'],
				'card'  => $form['stripeToken'],
			));
			$subscription = \Stripe\Subscription::create([
				'customer' => $customer->id,
				'items' => [['plan' =>  $form['package'] ]],
			]);
			$err['stripe_customer']  		= $subscription->customer;
			$err['stripe_subscription']  	= $subscription->id;
			$err['status']  				= true;
		} catch(\Stripe\Error\Card $e) {
		// Since it's a decline, \Stripe\Error\Card will be caught
			$body = $e->getJsonBody();
			$err  = $body['error'];
			$err['status']  = false;
		} catch (\Stripe\Error\RateLimit $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Too many requests made to the API too quickly
		} catch (\Stripe\Error\InvalidRequest $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Invalid parameters were supplied to Stripe's API
		} catch (\Stripe\Error\Authentication $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Authentication with Stripe's API failed
		// (maybe you changed API keys recently)
		} catch (\Stripe\Error\ApiConnection $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Network communication with Stripe failed
		} catch (\Stripe\Error\Base $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Display a very generic error to the user, and maybe send
		// yourself an email
		} catch (Exception $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Something else happened, completely unrelated to Stripe
		}
		return $err;
	} else {

		try {
			$customer = \Stripe\Customer::create(array(
				'email' => $form['email'],
				'card'  => $form['stripeToken'],
			));
			$charge = \Stripe\Charge::create([
				'customer' => $customer->id,
				'amount'   => round($form['amount'] * 100),//amount shuld be in cent...
				'currency' => 'usd',
			]);
			$err['stripe_customer'] = $customer->id;
			$err['status']  = true;

		} catch(\Stripe\Error\Card $e) {
		// Since it's a decline, \Stripe\Error\Card will be caught
			$body = $e->getJsonBody();
			$err  = $body['error'];
			$err['status']  = false;
		} catch (\Stripe\Error\RateLimit $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Too many requests made to the API too quickly
		} catch (\Stripe\Error\InvalidRequest $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Invalid parameters were supplied to Stripe's API
		} catch (\Stripe\Error\Authentication $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Authentication with Stripe's API failed
		// (maybe you changed API keys recently)
		} catch (\Stripe\Error\ApiConnection $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Network communication with Stripe failed
		} catch (\Stripe\Error\Base $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Display a very generic error to the user, and maybe send
		// yourself an email
		} catch (Exception $e) {
			$body = $e->getJsonBody();
			$err['error']  = $body['error'];
			$err['status']  = false;
		// Something else happened, completely unrelated to Stripe
		}
		return $err;
	}
}









function get_user_email_by_id($id=''){
	$user_info = get_userdata($id);
	return $user_info->data->user_email;
}
add_action( 'wp_ajax_cs_stripe_recuring_endpoint', 'cs_stripe_recuring_endpoint' );
add_action( 'wp_ajax_nopriv_cs_stripe_recuring_endpoint', 'cs_stripe_recuring_endpoint' );
function cs_stripe_recuring_endpoint(){
	global $wpdb, $obj;
	$input = @file_get_contents("php://input");
	$event_json = json_decode($input, true);

	echo "<pre>";
	print_r($event_json);
	echo "</pre>";


	$customerid = $event_json['data']['object']['source']['customer'];

	// bann
	if ($event_json['type'] =='charge.expired') {
		$getuser = $obj->getRows( $wpdb->prefix.'bird_booking_subscription', ['where'=>['stripe_cus_id' =>$customerid ], 'return_type' => 'single' ] );

		$wpdb->update( $wpdb->prefix.'bird_booking_subscription', ['status' => 'expire' ], ['stripe_cus_id' =>$customerid ]);
		
		$message = '
		Hello,
		
		It is inform you that your account has been suspended. Kindly renew your account.
		
		Regards
		';
		wp_mail( $getuser->email, 'Account Suspended', $message);
	}

	//unbann
	if ($event_json['type'] == 'charge.succeeded') {
		
		$getuser = $obj->getRows( $wpdb->prefix.'bird_booking_subscription', ['where'=>['stripe_cus_id' =>$customerid ], 'return_type' => 'single' ] );
		
		$wpdb->update( $wpdb->prefix.'bird_booking_subscription', ['status' => 'active' ], ['stripe_cus_id' => $customerid ]);
		
		$payment = array(
			'booking_subscription' => $getuser->id, 
			'paid' => get_subscription_amount_by_id($getuser->subscription), 
			'status' => 'paid', 
		);
		$wpdb->insert( $wpdb->prefix.'bird_payment', $payment);

		
		$message = '
		Hello,
		
		It is inform you that your account has been renew. Kindly check your account.
		
		Regards
		';
		wp_mail( get_user_email_by_id($getuser->user_id), 'Account has been Renew', $message);
	}


	if ($event_json['type'] == 'charge.failed') {
		$getuser = $obj->getRows( $wpdb->prefix.'bird_booking_subscription', ['where'=>['stripe_cus_id' =>$customerid ], 'return_type' => 'single' ] );

		$wpdb->update( $wpdb->prefix.'bird_booking_subscription', ['status' => 'failed' ], ['stripe_cus_id' =>$customerid ]);

		$message = '
		Hello,
		
		It is inform you that your account has been suspended. Kindly renew your account.
		
		Regards
		';
		wp_mail( $getuser->email, 'Account Suspended', $message);
	}
	exit();
}


