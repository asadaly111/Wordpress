<?php
/**
* China Brands
*/
class Powerbody{

	protected $login;
	protected $password;
	protected $wsdl = 'http://www.powerbody.co.uk/index.php/api/soap/?wsdl';

	function __construct(){
		$this->login = get_option('api_login');
		$this->password = get_option('api_pwd');
	}



	public function Product_list(){
		try {
			$client = new SoapClient($this->wsdl, array('cache_wsdl' => WSDL_CACHE_NONE));
			$session = $client->login($this->login, $this->password);
			$pageno = array(
				'page' => 1
			);
			$result = $client->call($session, 'dropshipping.getProductList', json_encode($pageno));
			$result = json_decode($result, true);
			if ($result) {
				foreach ($result as $key) {

					try {
						$product = $client->call($session, 'dropshipping.getProductInfo', $key['product_id']);
						$product = json_decode($product, true);
						$pro[] = $product;
 					} catch (Exception $e) {
						var_dump($e);
					}
				}
			}
			$client->endSession($session);
			return $pro;
		}catch (Exception $e){
			var_dump($e);
		}
	}

}
$Powerbody = new Powerbody();