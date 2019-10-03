<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
	
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));

    if ( is_rtl() ) 
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}

require 'inc/main_class.php';
require 'inc/cs_functions.php';
require_once('vendor/autoload.php');









add_action( 'wp_ajax_booking_details', 'booking_details' );
add_action( 'wp_ajax_nopriv_booking_details', 'booking_details' );
function booking_details(){
	global $wpdb;
	$id = $_GET['id'];
	$results = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'bird_payment WHERE booking_subscription='.$id);
	$content = '
	<h2>Shipping Details:</h2>
	<table class="table table-hover" style="font-size: 12px;">
	<thead>
	<tr>
	<th>Payment Status</th>
	<th>Amount Paid</th>
	</tr>';
	foreach ($results as $row_item) {
		$content .= '<tr><td>'.ucwords($row_item->status).'</td> <td>'.$row_item->paid.'</td></tr>';
	}
	$content .= '</tbody></table>';
	echo $content;
	exit();
}


add_action( 'wp_ajax_booking_billing_detail', 'booking_billing_detail' );
add_action( 'wp_ajax_nopriv_booking_billing_detail', 'booking_billing_detail' );
function booking_billing_detail(){
	global $wpdb;
	$id = $_GET['id'];
	$results = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'bird_booking_subscription WHERE id='.$id);

	$message .= '<h2>Billing Details</h2>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	
	$message .= "<tr style='background: #eee;'><td><strong>First Name :</strong> </td><td>".$results->first_name."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Last Name :</strong> </td><td>".$results->last_name."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Country Code :</strong> </td><td>".$results->country."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Address :</strong> </td><td>".$results->street_address."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>City :</strong> </td><td>".$results->city."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Region :</strong> </td><td>".$results->state."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Zipcode :</strong> </td><td>".$results->zip."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Email :</strong> </td><td>".$results->email."</td></tr>";
	
	$message .= "</table>";
	echo $message;
	exit();
}





add_action( 'wp_ajax_booking_shipping_detail', 'booking_shipping_detail' );
add_action( 'wp_ajax_nopriv_booking_shipping_detail', 'booking_shipping_detail' );
function booking_shipping_detail(){
	global $wpdb;
	$id = $_GET['id'];
	$results = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'bird_booking_subscription WHERE id='.$id);
	$results = json_decode($results->shipping);
	$message .= '<h2>Shipping Details</h2>';	
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	foreach ($results as $key => $value) {
		$message .= "<tr style='background: #eee;'><td><strong>".ucwords(str_replace('_', ' ', $key)).":</strong> </td><td>".$value."</td></tr>";
	}
	$message .= "</table>";
	echo $message;
	exit();
}
?>