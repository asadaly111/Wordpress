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
	'image' => 'https://tribe228.com/wp-content/uploads/2019/06/ORDER-SHIPPING.png',
	'title' => 'ORDER, SHIPPING AND PROCESSING INFORMATION',
	'content' => '
ORDER, SHIPPING AND PROCESSING INFORMATION

Tribe 228 provides complete assurance that all your clothing is delivered and received within the time frame mentioned in the delivery form. Please enter your mailing address correctly and provide an additional contact number for further assistance. We do not take responsibility for lost, misplaced, or incorrectly delivered shipments at Tribe 228. All shipping is done to PO box and addresses. Additional carrier options are available, and Tribe 228 has the right to reserve and change the freight and delivery carrier at any time. All orders take some delivery time that is entirely distinct from the time taken for the shipment to reach the destination. The standard, domestic and international orders may take up to 2-3 business days exclusive of Holidays and weekends.

After your payment is authorized and verified, standard orders can still take two business days to process. This is just an estimate and doesn’t include weekends or holidays. When your order has been shipped, you will receive an email with tracking information.

Shipping fees are non-refundable at Tribe 228. When the client or customer experiences a non-delivery or the tracking info states that the package was sent and delivered by the carrier, but the client has not received then the client must contact Tribe 228 within ten days to file a client.  The claims can take up to 30 days to be completely processed and are dependent on the carrier.
'
];
print(json_encode($data));