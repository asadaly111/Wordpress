<?php
require 'wp-load.php';

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


function get_date_month($date){
  $oDate = new DateTime($date);
  return $sDate = $oDate->format("M");
}

function get_date($date){
  $oDate = new DateTime($date);
  return $sDate = $oDate->format("D");
}

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "https://dev13.onlinetestingserver.com/tribe/wp-json/wc/v3/reports/sales?consumer_key=ck_08b2c8e12d958e0b2581808355bae1fee95ed503&consumer_secret=cs_355db4500d265151e0be7c9f4e879fda4890ad45&period=week",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: 966da81a-9c6a-aaa0-eb0a-75224fffd2d3"
	),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$newesp = json_decode($response);
	foreach ($newesp[0]->totals as $key => $value) {
		$data['daily_sale_chart']['labels'][] = substr(get_date($key), 0, 1);
		$data['daily_sale_chart']['series'][] = $value->sales;


		$data['daily_completed_orders']['labels'][] = substr(get_date($key), 0, 1);
		$data['daily_completed_orders']['series'][] = $value->orders;

	}

	global $wpdb;
	$table = $wpdb->prefix.'newsletter';
	$emaildata = $wpdb->get_results("
		SELECT Year(created), Month(created) as month, created, Count(*) as count
		FROM ".$table."
		WHERE created >= CURDATE() - INTERVAL 1 YEAR
		GROUP BY Year(created), Month(created)
		");
	foreach ($emaildata as $key) {
		$data['monthly_subscriber']['labels'][] = get_date_month($key->created);
		$data['monthly_subscriber']['series'][] = $key->count;
	}
	print(json_encode($data));
}