<?php 
class cs_ajax{
	
	function __construct(){
		add_action( "wp_ajax_create_booking", array($this, 'create_booking'), 10 );
		add_action( "wp_ajax_nopriv_create_booking", array($this, 'create_booking'), 10 );
	}


	public function create_booking(){
			$response['status'] =  false;
			$response['response'] = null;
			$response['message'] =  $result_array;
		print(json_encode($response));
		exit();
	}



}
new cs_ajax();