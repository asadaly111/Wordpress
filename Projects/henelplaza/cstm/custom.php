<?php 

// ************* STUDENT
add_action( 'wp_ajax_cms_checkusername', 'cms_checkusername' );
add_action( 'wp_ajax_nopriv_cms_checkusername', 'cms_checkusername' );
function cms_checkusername(){
	if (username_exists($_POST['userName'])) {
		echo 'false';
	}else{
		echo 'true';
	}
	exit();
}
add_action( 'wp_ajax_cms_checkemail', 'cms_checkemail' );
add_action( 'wp_ajax_nopriv_cms_checkemail', 'cms_checkemail' );
function cms_checkemail(){
	if (email_exists($_POST['userEmail'])) {
		echo 'false';
	}else{
		echo 'true';
	}
	exit();
}


add_action( 'wp_ajax_cms_kvk_number', 'cms_kvk_number' );
add_action( 'wp_ajax_nopriv_cms_kvk_number', 'cms_kvk_number' );
function cms_kvk_number(){
	$code = $_POST['kvk_number'];
	$ch = curl_init();
	$url = 'https://api.kvk.nl:443/api/v2/testsearch/companies';
	$queryParams = '?' . urlencode('kvkNumber') . '=' . urlencode($code);
	curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	$response = curl_exec($ch);
	curl_close($ch);
	$kvkresponse = json_decode($response, true);
	if (!empty($kvkresponse['data']['items'])) {
		echo 'true';
	}else{
		echo 'false';
	}
	exit();
}


// Ajax check for store name.
add_action( 'wp_ajax_nopriv_wk_check_myshop','wk_check_myshop_value____' );
add_action( 'wp_ajax_wk_check_myshop','wk_check_myshop_value____' );
function wk_check_myshop_value____(){

        if(check_ajax_referer( 'ajaxnonce', 'nonce',false)){

	        $url_slug = $_POST['shop_slug'];
	        $check    = false;
	        $user     = get_user_by( 'slug', $url_slug );

	        if ( empty( $url_slug ) ) {
	            $check=false;
	        }
	        else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $url_slug))
			{
				$check=false;
	        }
	        else if(ctype_space($_POST['shop_slug'])){
	        	$check=false;
	        }
	        else if ( $user != '' ) {
	            $check = 2;
	        }
	        else{
	        	$check=true;
	        }

	        echo $check;

			die;
	}
}

function insert_student($form = array()){


	$apiExecutor = new PayCheckout\ApiExecutor(608984454, 'c6f6ac39-15da-4921-911a-bb20eb112949',true);
	$addBankAccount = new PayCheckout\Api\Customer\AddVerifiedBankAccount('201802202041949186', $form['ac_name'], $form['iban_number'] ,null);
	$bankResponse = $addBankAccount->execute($apiExecutor);
	if ($bankResponse->getApiResult() == PayCheckout\ApiResult::SUCCESS){
		

		global $wpdb;
		$userdata = array(
			'user_login'  =>  $form['userName'],
			'user_email' => $form['userEmail'],
			'user_pass'   => $form['password'],
			'first_name' => $form['userFirst'],
			'last_name' => $form['userLast'],
		);
		$user_id = wp_insert_user( $userdata );

		$bankac = array(
			'kvk' => $form['kvk_number'], 
			'iban' => $form['iban_number'], 
			'ac_name' => $form['ac_name'], 
		);
		add_user_meta( $user_id,'_seller_bankacount', $bankac , false);
		add_user_meta( $user_id,'shop_name', $form['shop_name'], false);
		add_user_meta( $user_id,'shop_address', $form['shop_url'], false);



		add_user_meta( $user_id,'shop_dsc', $form['shop_dsc'], false);
		add_user_meta( $user_id,'shop_shipping', $form['logistics'], false);
		add_user_meta( $user_id,'shop_product_dsc', $form['product_dsc'], false);

		
		$seller_table=$wpdb->prefix.'mpsellerinfo';
		if(get_option('wkmp_auto_approve_seller')){
			$seller=array('user_id'=>$user_id,'seller_key'=>'role','seller_value'=>"seller");
		}else{
			$seller=array('user_id'=>$user_id,'seller_key'=>'role','seller_value'=>"customer");
		}
		$seller_res = $wpdb->insert($seller_table, $seller);
		/* defining role as marketplace seller*/
		$user_role = new WP_User($user_id);
		//$user_role->remove_role(get_option('default_role');
		$user_role->add_role('wk_marketplace_seller');
		if(get_option('wkmp_auto_approve_seller')){
			$user_role->set_role('wk_marketplace_seller');
		}else{
			$user_role->set_role(get_option('default_role'));
		}


		$msg = array(
			'msg' 	=> 'Your account has been created! <a href="'.site_url('/my-account/').'" style="font-size: 13px;">Click here for Login</a>',
			'class' => 'isa_error isa_sucess',
		);
		return $msg = json_encode($msg);
		
	}else{
		$msg = array(
			'msg' 	=> 'Your IBAN OR Name is not correct...',
			'class' => 'isa_error',
		);
		return $msg = json_encode($msg);
	}


}




add_action( 'wp_ajax_cms_formsubmit', 'cms_formsubmit' );
add_action( 'wp_ajax_nopriv_cms_formsubmit', 'cms_formsubmit' );
function cms_formsubmit(){
	global $wpdb;
	print(insert_student($_POST));
	exit();
}
