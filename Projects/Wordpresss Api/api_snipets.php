<?php 
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
if (!array_key_exists('your_name', $postdata)){
	http_response_code(404);
	echo json_encode('Name required!');
	die();
}else if (!array_key_exists('email', $postdata)){
	http_response_code(404);
	echo json_encode('Email required!');
	die();

}else if (!array_key_exists('message', $postdata)){
	http_response_code(404);
	echo json_encode('Message required!');
	die();
}else{
	
}










// 1st step 
function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header'); ?>



// 2nd option .htaccess
 <IfModule mod_headers.c>
   Header set Access-Control-Allow-Origin "*"
 </IfModule>



