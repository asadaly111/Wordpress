<?php 
define('ABSPATH', dirname(dirname(dirname(dirname(__FILE__)))).'/');

require_once (ABSPATH.'wp-load.php');


$login = 'sales@mega-nutrition.co.uk';
$password = 'nuttrisal21@';
$wsdl = 'http://www.powerbody.co.uk/index.php/api/soap/?wsdl';
$client = new SoapClient($wsdl, array('cache_wsdl' => WSDL_CACHE_NONE));
$session = $client->login($login, $password);




$status = true;
$i = 1;
while($status){

	try {

		$pageno = array('page' => $i );
		$result = $client->call($session, 'dropshipping.getProductList', json_encode($pageno));
		$result = json_decode($result, true);
		echo $i++;
		echo "<br>";

		foreach ($result as $key) {
			$check = get_product_by_sku($key['sku']);
			if ($check) {
				update_post_meta( $check , '_regular_price', $key['price_tax']);
				update_post_meta( $check , '_price', $key['price_tax']);
				update_post_meta( $check , '_manage_stock', 'yes' );
				update_post_meta( $check, '_stock', $key['qty']);
				update_post_meta( $check, '_weight', $key['weight']);
			}
		}

		if (empty($result)) {
			$status = false;
		}
	}catch (Exception $e){
		if ($e->faultcode == 5) {
		} else {
		}

	}
}

