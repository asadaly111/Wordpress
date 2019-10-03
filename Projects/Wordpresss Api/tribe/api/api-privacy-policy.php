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
	'image' => 'https://tribe228.com/wp-content/uploads/2019/06/Privacy-policy.png',
	'title' => 'RETURN POLICY',
	'content' => 'We at Tribe 228 have a flexible return policy if the client is unhappy with the purchase or would like to return the items purchased to Tribe 228’s distribution center.

To process your returns, please follow the simple steps

Complete the returns request form (included in your original packaging or by downloading and printing the return form available on the Tribe 228 website.
Depending on the shipping method and carrier chosen, the package can take some time to be delivered.
Please consent 6-7 business days to process your return once our Tribe 228 Distribution Center receives it.
Disclaimer – Keep your proof of postage fee and ship your return along with a tracking number as we are not responsible for return packages that are lost or stolen in-transit or in-freight.

',
];
print(json_encode($data));
