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

$data = [
	'image' => 'https://tribe228.com/wp-content/uploads/2019/06/SECURE-SHOPPING.png',
	'title' => 'SECURE SHOPPING',
	'content' => '
	Tribe228 offers secured shopping through Authorized.net
	We accept all major credit cards. All payments made on our website or application is secured through the Autorized.net merchant platform. 
	We are using one of the best payment merchants in the world, so enjoy your shopping at Tribe228 without any fear, or hassle
	',
];
print(json_encode($data));