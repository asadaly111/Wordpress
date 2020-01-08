<?php 
class cs_ajax{
	
	function __construct(){
		add_action( "wp_ajax_create_booking", array($this, 'create_booking'), 10 );
		add_action( "wp_ajax_nopriv_create_booking", array($this, 'create_booking'), 10 );
	}


	public function create_booking(){


		$amount 	= $_POST['amounttotal'];
		$postcode 	= $_POST['cardsdetails']['billing_postcode'];
		$card 		= $_POST['cardsdetails']['credit_card'];
		$cvv 		= $_POST['cardsdetails']['cvv'];
		$expiry 	= $_POST['cardsdetails']['expiration_date'];
		$fname 	= $_POST['fname'];
		$lname 	= $_POST['lname'];



		global $api_username, $api_password, $api_signature, $api_version, $api_endpoint, $wpdb;

		$exp = explode('/', $expiry);

		// Min fields in paypal pro
		$request_params = array(
			'METHOD'        => 'DoDirectPayment',
			'USER'          => $api_username,
			'PWD'           => $api_password,
			'SIGNATURE'     => $api_signature,
			'VERSION'       => $api_version,
			'PAYMENTACTION' => 'Sale',
			'IPADDRESS'     => $_SERVER['REMOTE_ADDR'],
			'ACCT'          => $card,
			'EXPDATE'       => $exp[0].$exp[1],
			'CVV2'          => $cvv,
			'FIRSTNAME'     => $fname,
			'LASTNAME'      => $lname,
			'COUNTRYCODE'   => 'US',
			'AMT'           => $amount,
			'CURRENCYCODE'  => 'USD',
			'DESC'          => 'Booking',
		);


		$nvp_string = '';
		foreach($request_params as $var=>$val){
			$nvp_string .= '&'.$var.'='.urlencode($val);
		}
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_URL, $api_endpoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
		$result = curl_exec($curl);
		curl_close($curl);
		$result_array = NVPToArray($result);
		if ($result_array['ACK'] == 'Success') {
			

			$serviceId 	= $_POST['serviceId'];
			$slot_Id 	= $_POST['slot_Id'];
			$date 		= $_POST['date'];
			$timeslot 	= $_POST['timeslot'];
			$serviceName 	= $_POST['serviceName'];


			$email 		= $_POST['email'];
			$phone 		= $_POST['mobile'];
			$fullname 	= $_POST['fname'].' '.$_POST['lname'];


			global $bokingobj, $wpdb;
			
			$data2 = json_decode( $bokingobj->bookslot(6,$slot_Id,$date,$timeslot,$serviceId,$fullname,$email,$phone,0,[@$_POST['slotsub_Id']]), true);

			// bookslot($resource,$slot,$date,$starttime,$services,$name,$email,$phone,$user_id,$subserviceslots)

            $data = array(
                'booking_id' 	=> $data2['bookingid'],
                'transactionid' => $result_array['TRANSACTIONID'],
                'formdata' 		=> json_encode($_POST),
                'response' 		=> json_encode($data),
                'status' 		=> 'success',
            );
            $wpdb->insert($wpdb->prefix.'easybooking' , $data);


            $emailTemplate =  dirname(__FILE__).'/PHP-Email-Template-Parser-Class-master/email-template.tpl';
            $emailHtml = new EmailTemplateParser($emailTemplate);
            $emailHtml->setVar('order_id', $data2['bookingid']);
            $emailHtml->setVar('date', $date);
            $emailHtml->setVar('serviceName', $serviceName);
            $emailHtml->setVar('qty', '1');
            $emailHtml->setVar('slot', timeto12($timeslot) );
            $emailHtml->setVar('price', $amount);
            $message = $emailHtml->output();


            $headers = array('Content-Type: text/html; charset=UTF-8');
            $to = 'asad.ali@salsoft.net';
            $subject = "Nina V Booking Invoice";
            wp_mail($to, $subject,$message, $headers);
            //user email alert
            wp_mail($email, $subject,$message, $headers);

			$response['response'] = $result_array['TRANSACTIONID'];
			$response['status'] = true;
			$response['message'] = $data2;
		}else{
			$response['status'] =  false;
			$response['response'] = null;
			$response['message'] =  $result_array;

		}

		print(json_encode($response));
		exit();
	}



}
new cs_ajax();