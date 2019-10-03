<?php 
require 'wp-load.php';
// require dirname(__FILE__).'/wp-content/plugins/flexible-shipping-ups/classes/access-points-helper.php';
require dirname(__FILE__).'/wp-content/plugins/flexible-shipping-ups/classes/shipping-method.php';
require dirname(__FILE__).'/wp-content/plugins/flexible-shipping-ups/classes/access-points-helper.php';



$access_points = new Flexible_Shipping_UPS_Access_Points_Helper('5D627A19EF7D855A', 'TRIBE228' , 'Tribe#228');


$locations = $access_points->get_access_points_for_postcode( 'US', '90001', 50 );


$args = $access_points->prepare_items_for_select_field( $locations );






echo "<pre>";
print_r($args);
echo "</pre>";


die();



// $objj = new Flexible_Shipping_UPS_Access_Points_Helper( '5D627A19EF7D855A', 'TRIBE228', 'Tribe#228');


// $shipping = new Flexible_Shipping_UPS_Shipping_Method();


// echo "<pre>";
// $data['destination'] =  array(
// 	'address' => '10227 Lincoln trail suite 6', 
// 	'address_2' => 'Quo maxime inventore', 
// 	'city' => 'fairview heights', 
// 	'postcode' => '62208', 
// 	'country' => 'US', 
// );
// print_r($data);



// $_product = wc_get_product( 1802 );
// print_r($_product);
// print_r($shipping->calculate_shipping($data));


































die();
$locations = $objj->get_nearest_access_point_for_postcode('US', '62208');
echo "<pre>";
print_r($locations);
print_r($objj->prepare_items_for_select_field($locations->AccessPointInformation->PublicAccessPointID));
print_r($objj->get_access_point_by_id($locations->AccessPointInformation->PublicAccessPointID, 'US'));
// $new = $objj->prepare_items_for_select_field( $locations );
print_r($locations->AccessPointInformation->PublicAccessPointID);
echo "</pre>";