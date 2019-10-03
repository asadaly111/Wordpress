<?php  header('Content-Type: application/json');?>
<?php

$postdata = json_decode(file_get_contents('php://input'), true);
// echo "<pre>";
// print_r($postdata['order']);
if($postdata){
require_once("wp-load.php");
// global $wpdb;
	// $tax_rates = get_option( 'woocommerce_tax_rates' , array());
	$lettermail	  = get_option('woocommerce_uspswebservice_lettermail', array());
	
	$shipping_state = $postdata['state'];
	if($shipping_state != ""){
		foreach ($lettermail as $key => $shipping) {
			if($shipping['prov'] == $shipping_state){
				$data['shippingData']['full'] = $shipping;
				$data['shippingData']['method_title'] = $shipping['label'];
				$data['shippingData']['amount'] = $shipping['cost'];
			}
		}
	}

	$sql = 'SELECT * FROM '.$wpdb->prefix.'woocommerce_tax_rates WHERE tax_rate_country="'.$postdata['country'].'" AND  tax_rate_state="'.$postdata['state'].'"';
	$taxRate = $wpdb->get_row($sql);
	// print_r($tax_rates);
	// die();
	$data['taxData'] = $taxRate;	
	// $data['sql'] = $sql;	


echo json_encode($data);

}