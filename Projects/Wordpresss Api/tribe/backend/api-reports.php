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


// Total Order
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "https://dev13.onlinetestingserver.com/tribe/wp-json/wc/v3/reports/orders/totals?consumer_key=ck_08b2c8e12d958e0b2581808355bae1fee95ed503&consumer_secret=cs_355db4500d265151e0be7c9f4e879fda4890ad45",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 60,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: eebb5df3-c5ef-2282-1528-0649dda8ef24"
	),
));
$response = curl_exec($curl);
$err = curl_error($curl);
if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$data[] = json_decode($response);
}
curl_close($curl);


// Total Sales
$curl2 = curl_init();
curl_setopt_array($curl2, array(
	CURLOPT_URL => "https://dev13.onlinetestingserver.com/tribe/wp-json/wc/v3/reports/sales?consumer_key=ck_08b2c8e12d958e0b2581808355bae1fee95ed503&consumer_secret=cs_355db4500d265151e0be7c9f4e879fda4890ad45",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 60,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: eebb5df3-c5ef-2282-1528-0649dda8ef24"
	),
));
$response2 = curl_exec($curl2);
$err2 = curl_error($curl2);
if ($err2) {
	echo "cURL Error #:" . $err2;
} else {
	$data[] = json_decode($response2);
}
curl_close($curl2);



// all products
$curl3 = curl_init();
curl_setopt_array($curl3, array(
	CURLOPT_URL => "https://dev13.onlinetestingserver.com/tribe/wp-json/wc/v3/reports/products/totals?consumer_key=ck_08b2c8e12d958e0b2581808355bae1fee95ed503&consumer_secret=cs_355db4500d265151e0be7c9f4e879fda4890ad45",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 60,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: eebb5df3-c5ef-2282-1528-0649dda8ef24"
	),
));
$response3 = curl_exec($curl3);
$err3 = curl_error($curl3);
if ($err3) {
	echo "cURL Error #:" . $err3;
} else {
	$data[] = json_decode($response3);
}
curl_close($curl3);




// all customers
$curl4 = curl_init();
curl_setopt_array($curl4, array(
	CURLOPT_URL => "https://tribe228.com/wp-json/wc/v3/reports/customers/totals?consumer_key=ck_08b2c8e12d958e0b2581808355bae1fee95ed503&consumer_secret=cs_355db4500d265151e0be7c9f4e879fda4890ad45",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 60,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: eebb5df3-c5ef-2282-1528-0649dda8ef24"
	),
));
$response4 = curl_exec($curl4);
$err4 = curl_error($curl4);
if ($err4) {
	echo "cURL Error #:" . $err4;
} else {
	$data[] = json_decode($response4);
}
curl_close($curl4);


print(json_encode($data));
