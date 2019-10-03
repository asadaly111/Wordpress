<?php 
require_once("wp-load.php");
// header('Content-Type: application/json');?>

<?php 

$url =  __DIR__ . '/apis/vendor/autoload.php';require ($url);
use Automattic\WooCommerce\Client;
$woocommerce = new Client(
    'https://dev20.onlinetestingserver.com/smacksandsmooche/',
    'ck_1092fd6b1172771db0058ff3df49f864e986d524',
    'cs_3f7e1314ea4e1413d29287fd594ed511ec6a1e9f',
    [
      'wp_api'  => true,
      'version' => 'wc/v2',
      'query_string_auth' => true
    ]
  );


$postdata = json_decode(file_get_contents('php://input'), true);

// $order = json_encode($woocommerce->post('orders', $postdata));
// // $orderOBJ = json_decode($order);
// // // print_r($orderOBJ);
// // $placedOrder = new WC_Order($orderOBJ->id);
// // // $placedOrder->add_coupon( sanitize_text_field( '7+' ));
// // $placedOrder->calculate_totals();

// $coupon             = new WC_Coupon( "7+" );
//     $coupon_type        = $coupon->discount_type;
//     $coupon_amount      = $coupon->coupon_amount;
//     $final_discount     = 0;

//     // You must calculate the discount yourself! I have not found a convenient method outside the WC_Cart context to do this for you.
//     $final_discount = $coupon_amount;

    // $placedOrder->add_coupon(  "7+", $final_discount, 0 );
    // $placedOrder->set_total($coupon_amount, 'order_discount');
    //  $placedOrder->calculate_totals();

echo $order = json_encode($woocommerce->post('orders', $postdata));
// $orderOBJ = json_decode($order);
// echo $placedOrder = new WC_Order($orderOBJ->ID);
/*$placedOrder->add_coupon( sanitize_text_field( '7+' ));*/

// $postdata['coupon_lines'] = [
//         [
//             'code' => '7+',
//             'discount' => '20',
//             'discount_tax' => '20',
//             'meta_data' => [
//                 [
//                     'key' => 'coupon_data',
//                     'value' => [
//                         'id' => '871',
//                         'code' => '7+',
//                     ]
//                 ]
//             ]
//         ]
//     ];
// // echo json_encode($postdata);
// $shipping_lines = $postdata['shipping_lines'];

// $order = wc_create_order();
// $addressBilling = $postdata['billing'];
// $addressShipping = $postdata['shipping'];


// $order->set_address($addressBilling, 'billing');
// $order->set_address($addressShipping, 'shipping');

// $productids = ['700','701','702'];
// foreach ($productids as $key => $productid) {
//   $product = new WC_Product($productid);
//   update_post_meta($productid, "_stock", (get_post_meta($productid, "_stock", true) - 1));
   
//   $order->add_product($product, 1);
// }

// add_post_meta($order_id, '_payment_method', 'COD');
// update_post_meta($order_id, '_created_via', 'checkout');
// update_post_meta($order_id, '_customer_user',6);
// add_post_meta($order_id, '_payment_method_title', 'Cash on Delivery');


// $rate = new WC_Shipping_Rate($shipping_lines['method_id'].":1", $shipping_lines['method_title'],  $shipping_lines['total'], array(), $shipping_lines['method_id']);
//     $item = new WC_Order_Item_Shipping();
//     $item->set_props(array('method_title' => $rate->label, 'method_id' => $rate->id, 'total' => wc_format_decimal($rate->cost), 'taxes' => $rate->taxes, 'meta_data' => $rate->get_meta_data()));
//     $order->add_item($item);


// $order->update_status('processing');
// $order->payment_complete();
// $order->calculate_totals();

// $productids = ['700','701','702'];
// foreach ($productids as $key => $productid) {
//   $product = new WC_Product($productid);
//   update_post_meta($productid, "_stock", (get_post_meta($productid, "_stock", true) - 1));
   
//   $order->add_product($product, 2);
// }

// echo $order = new WC_Order( $order->ID );


// $address = array(
//     'first_name' => $payload['customer']['firstName'],
//     'last_name'  => $payload['customer']['lastName'],
//     'email'      => $payload['customer']['email'],
//     'phone'      => $payload['customer']['phone'],
//     'address_1'  => $payload['customer']['line1'],
//     'address_2'  => $payload['customer']['line2'],
//     'city'       => $payload['customer']['city'],
//     'state'      => $payload['customer']['state'],
//     'postcode'   => $payload['customer']['zip'],
//     'country'    => 'US'
//   );
//   $order = wc_create_order();
//   foreach ($payload['items'] as $item) {
//     $order->add_product( get_product_by_sku( $item['sku'] ), $item['qty'] );
//   }
//   $order->set_address( $address, 'billing' );
//   $order->set_address( $address, 'shipping' );
  
//   $order->update_status('processing');
//   $order->calculate_shipping();
//   $order->calculate_totals();



// $address = array(
//   'first_name' => 'Zayle',
//   'last_name' => 'Ong',
//   'company' => 'Timios',
//   'email' => 'charlestsmith888@gmail.com',
//   'phone' => '777-777-777-777',
//   'address_1' => '31 Main Street',
//   'address_2' => '',
//   'city' => 'Simei',
//   'state' => 'SG',
//   'postcode' => '520151',
//   'country' => 'Singapore'
// );
// $addressShipping = array(
//   'first_name' => 'Zayle',
//   'last_name' => 'Ong',
//   'company' => 'Timios',
//   'email' => 'charlestsmith888@gmail.com',
//   'phone' => '777-777-777-777',
//   'address_1' => '31 Main Street',
//   'address_2' => '',
//   'city' => 'Simei',
//   'state' => 'SG',
//   'postcode' => '520151',
//   'country' => 'Singapore'
// );
// $userid = 6;
  
// $productids = ['700','701','702'];

// $order = wc_create_order();
// foreach ($productids as $key => $productid) {
//   $product = new WC_Product($productid);

//   update_post_meta($productid, "_stock", (get_post_meta($productid, "_stock", true) - 1));
   
//   $order->add_product($product, 2);
// }
    
// $order->set_address($address, 'billing');
// $order->set_address($addressShipping, 'shipping');
// // $discount_code = str_replace("--userid--", $userid, "ORDER CREATED FROM API ON_" . date("d-m-Y") . "_" . rand(0, 99999));

// $order->calculate_totals();
// $order->set_total($order->calculate_totals());
// $order->update_status("Completed", 'Imported order', TRUE);

// $orderid = new WC_Order($order->ID);
// echo $order_id = trim(str_replace('#', '', $order->get_order_number()));

// add_post_meta($order_id, '_payment_method', 'COD');
// update_post_meta($order_id, '_created_via', 'checkout');
// update_post_meta($order_id, '_customer_user', $userid);
// add_post_meta($order_id, '_payment_method_title', 'Cash on Delivery');

// echo json_encode($orderid);
// $data = [
//     'payment_method' => 'COD',
//     'payment_method_title' => 'Cash On Delivery',
//     'set_paid' => true,
//     'billing' => [
//         'first_name' => 'John',
//         'last_name' => 'Doe',
//         'address_1' => '969 Market',
//         'address_2' => '',
//         'city' => 'San Francisco',
//         'state' => 'CA',
//         'postcode' => '94103',
//         'country' => 'US',
//         'email' => 'john.doe@example.com',
//         'phone' => '(555) 555-5555'
//     ],
//     'shipping' => [
//         'first_name' => 'John',
//         'last_name' => 'Doe',
//         'address_1' => '969 Market',
//         'address_2' => '',
//         'city' => 'San Francisco',
//         'state' => 'CA',
//         'postcode' => '94103',
//         'country' => 'US'
//     ],
//     'line_items' => [
//         [
//             'product_id' => 700,
//             'quantity' => 2
//         ],
//         [
//             'product_id' => 700,
//             'quantity' => 1
//         ]
//     ]
// ];

// // print_r($woocommerce->get('orders'));

// print_r($woocommerce->post('orders', $data));


// $data = array(
//     'order' => array(
//         'payment_details' => array(
//             'method_id' => 'cod',
//             'method_title' => 'Cash on Delivery',
//             'paid' => true
//         ),
//         'billing_address' => array(
//             'first_name' => 'John',
//             'last_name' => 'Doe',
//             'address_1' => '969 Market',
//             'address_2' => '',
//             'city' => 'San Francisco',
//             'state' => 'CA',
//             'postcode' => '94103',
//             'country' => 'US',
//             'email' => 'john.doe@example.com',
//             'phone' => '(555) 555-5555'
//         ),
//         'shipping_address' => array(
//             'first_name' => 'John',
//             'last_name' => 'Doe',
//             'address_1' => '969 Market',
//             'address_2' => '',
//             'city' => 'San Francisco',
//             'state' => 'CA',
//             'postcode' => '94103',
//             'country' => 'US'
//         ),
//         'customer_id' => 6,
//         'line_items' => array(
//             array(
//                 'product_id' => 700,
//                 'quantity' => 2
//             ),
//             array(
//                 'product_id' => 701,
//                 'quantity' => 1
//             )
//         ),
//         'shipping_lines' => array(
//             array(
//                 'method_id' => 'flat_rate',
//                 'method_title' => 'Flat Rate',
//                 'total' => 10
//             )
//         )
//     )
// );

// $data = [
//     'payment_method' => 'COD',
//     'payment_method_title' => 'Cash On Delivery',
//     'set_paid' => true,
//     'billing' => [
//         'first_name' => 'John',
//         'last_name' => 'Doe',
//         'address_1' => '969 Market',
//         'address_2' => '',
//         'city' => 'San Francisco',
//         'state' => 'CA',
//         'postcode' => '94103',
//         'country' => 'US',
//         'email' => 'john.doe@example.com',
//         'phone' => '(555) 555-5555'
//     ],
//     'customer_id' => 6,
//     'shipping' => [
//         'first_name' => 'John',
//         'last_name' => 'Doe',
//         'address_1' => '969 Market',
//         'address_2' => '',
//         'city' => 'San Francisco',
//         'state' => 'CA',
//         'postcode' => '94103',
//         'country' => 'US'
//     ],
//     'line_items' => [
//         [
//             'product_id' => 700,
//             'quantity' => 2
//         ],
//         [
//             'product_id' => 700,
//             'quantity' => 1
//         ]
//     ],
//     'shipping_lines' => [
//       [
//         "method_id"=> 'usps_medium_box',
//         'method_title'=> 'USPS Medium Flat Rate Box',
//         'total'=> '13.60'
//       ]
//     ],
//     'tax_lines' => [
//       [
//         "tax_total"=>"7.2500",
//         "label"=>"Salesss Tax",      
//       ]    
//     ]
// ];

// echo "processing";
// echo json_encode($woocommerce->post('orders', $postdata));
// echo json_encode($data);

?>