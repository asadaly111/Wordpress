<?php 
require_once("wp-load.php"); 
header('Content-Type: application/json');
http_response_code(404);
$response = array(
	"status"   => 0,
	"message"  => "Some Parameters are missing."
);

$postdata = json_decode(file_get_contents('php://input'), true);
if(isset($postdata["code"]) && isset($postdata ["password"])) {
	global $wpdb;
	$code 		= trim($postdata["code"]);
	$password 		= trim($postdata["password"]);
	$has_error	= FALSE;
	

	if($has_error == FALSE) {

			$mylink = $wpdb->get_row( "SELECT * FROM $wpdb->users WHERE `user_activation_key` = '$code'" );
			//print_r($mylink);

			if(!empty($mylink)){
				$user_login = $mylink->user_login;
				
				$wpdb->update( $wpdb->users, array( 'user_pass' => md5($password), 'user_activation_key' => '' ), array( 'user_login' => $user_login ) ); 
http_response_code(200); 
				$response["status"] = 1;
			    $response["message"] = "Password Changed";	
			}else {
http_response_code(404);
				$response["status"] = 0;
			    $response["message"] = "Invalid Code";	
			}

	}


}

echo json_encode($response, JSON_PRETTY_PRINT );
die;