<?php
add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
	
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));
	if ( is_rtl() )
		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}

add_action( 'wp_ajax_cms_formsubmit', 'cms_formsubmit' );
add_action( 'wp_ajax_nopriv_cms_formsubmit', 'cms_formsubmit' );
function cms_formsubmit(){
$headers = array('Content-Type: text/html; charset=UTF-8');
$to = 'asad.ali@salsoft.net';
$subject = "Booking - School Out Sports Camp";
$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

foreach ($_POST as $key => $value) {
	$message .= "<tr style='background: #eee;'><td><strong>".$key.":</strong> </td><td>".$value."</td></tr>";
}

$message .= "</table>";
$message .= "</body></html>";

wp_mail($to,  $subject,$message, $headers);
$message2 = '
Hello,

Thank you for choosing our services, we will respond to you shortly to confirm your payment, if you need any further information you can contact us by email.
Any additional services will be charged accordingly.

Kind Regards
Oopsy Daisy Daycare Ltd
info@oopsydaisydaycare.co.uk
';
wp_mail($_POST['Email'], 'Oopsy Daisy Daycare Ltd - Booking Confirmation',$message2);

global $wpdb;
$wpdb->insert($wpdb->prefix.'form_entries', ['fields' => json_encode($_POST)]);
$lastid = $wpdb->insert_id;
$_POST['url'] = site_url('/success/?id='.$lastid);
print(json_encode($_POST));	
exit();
}



// Styling and scripts
add_action('lms_scripts', 'lms_scripts_styles');
function lms_scripts_styles(){
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/bootstrap.css">';
}


add_menu_page( 'Inquries', 'Inquries', 'manage_options', 'cs_inquries', 'cs_inquries');
function cs_inquries(){
	require 'cs_inquries.php';
}