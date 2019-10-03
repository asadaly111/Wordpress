<?php
require dirname(dirname(__FILE__)).'/wp-load.php';

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

$data[] = [
	'cateid' => '111',
	'title' => 'Kids',
	'image' => site_url('/wp-content/uploads/2019/08/2019-08-20-1.png'),
	'buttonText' => 'View'
];
$data[] = [
	'cateid' => '109',
	'title' => 'Men',
	'image' => site_url('/wp-content/uploads/2019/08/2019-08-20-1.png'),
	'buttonText' => 'View'
];
$data[] = [
	'cateid' => '189',
	'title' => 'T Shirt',
	'image' => site_url('/wp-content/uploads/2019/08/2019-08-20-1.png'),
	'buttonText' => 'View'
];

print(json_encode($data));