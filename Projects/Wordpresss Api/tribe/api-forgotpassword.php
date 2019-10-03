<?php 
require_once("wp-load.php"); 
header('Content-Type: application/json');
http_response_code(404);
$response = array(
	"status"   => 0,
	"message"  => "Some Parameters are missing."
);


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$postdata = json_decode(file_get_contents('php://input'), true);
if(isset($postdata["email"])) {
	global $wpdb;
	$email 		= trim($postdata["email"]);
	$has_error	= FALSE;
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$response["message"] = "Invalid Email Address Provided.";
    	$has_error	= TRUE;
	}
	else if ( !email_exists( $email ) ) {
    	$response["message"] = "Email address does not exist.";
    	$has_error	= TRUE;
	}

	if($has_error == FALSE) {

		    $user 		= get_user_by('email', $email);
		    $key = generateRandomString(8);
		    $firstname 	= $user->first_name;
		    $user_login = $user->user_login;
		    $email 		= $user->user_email;
		    $rp_link 	= $key;
		    $admin_email = get_option( 'admin_email' );
		    $site_name   = get_option( 'blogname' );


		    $wpdb->update( $wpdb->users, array( 'user_activation_key' => $key ), array( 'user_login' => $user_login ) );  


		    if ($firstname == "") $firstname = "Customer";

		    $message	 = '<div align="center">
							<table width="600" cellspacing="5" cellpadding="5" border="0" style="color:#666 !important;background:none repeat scroll 0% 0% rgb(255,255,255);border-radius:3px;border:1px solid rgb(236,233,233)">
								<tbody>
								    <tr><td style="text-align:center"><img src="http://dev14.onlinetestingserver.com/tribe/wp-content/uploads/2018/11/logo.png" height="100px" align="center" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 842.641px; top: 334px;"><div id=":14o" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" title="Download" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V"><div class="aSK J-J5-Ji aYr"></div></div></div></td></tr>
									<tr>
									<th style="background-color:#17aca3;color:white">Hello '.$firstname.'</th>
									</tr>
									<tr>
									<td valign="top" style="text-align:left;color:#666;font-weight:600"><span style="color:#666;padding-bottom:10px;font-weight:300;display:block">We have received a forgot password request. Please use the code below to change your password: </span>
										 '.$rp_link.' <br>
									</td>
									</tr>
									<tr><td><br>Regards,<br><b>Tribe 228.com</b></td></td></tr>
								</tbody>
							</table>
						</div>
						';
		    $subject = "Forget password request received";
		  
$headers = array('Content-Type: text/html; charset=UTF-8');


		   wp_mail( $email, $subject, $message, $headers);


		http_response_code(200);
		   $response["status"] = 1;
		   $response["message"] = "Forget password email sent successfully.";

	}
}

echo json_encode($response, JSON_PRETTY_PRINT );
die;