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
$data[] = [
	'url' => 'https://tribe228.com/wp-json/wc/v3/products/?consumer_key=ck_08b2c8e12d958e0b2581808355bae1fee95ed503&consumer_secret=cs_355db4500d265151e0be7c9f4e879fda4890ad45&category=21',
	'screen' => 'shop',
	'image' => 'https://tribe228.com/wp-content/uploads/2019/06/Group-1085.png',
	'buttonText' => 'View'
];
$data[] = [
	'url' => 'https://tribe228.com/wp-json/wc/v3/products/?consumer_key=ck_08b2c8e12d958e0b2581808355bae1fee95ed503&consumer_secret=cs_355db4500d265151e0be7c9f4e879fda4890ad45&category=40',
	'screen' => 'shop',
	'image' => 'https://tribe228.com/wp-content/uploads/2019/06/Group-1102.png',
	'buttonText' => 'View'
];
$data[] = [
	'url' => 'https://tribe228.com/wp-json/wc/v3/products/categories?consumer_key=ck_08b2c8e12d958e0b2581808355bae1fee95ed503&consumer_secret=cs_355db4500d265151e0be7c9f4e879fda4890ad45&orderby=id&per_page=30&parent=21',
	'screen' => 'category',
	'image' => 'https://tribe228.com/wp-content/uploads/2019/06/Group-1086.png',
	'buttonText' => 'View'
];
print_r(json_encode($data));