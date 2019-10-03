<?php require_once("wp-load.php"); ?>
<?php  header('Content-Type: application/json');?>
<?php
// error_reporting(1);
$response = array('status'=>false, 'message'=>'Something Went Wrong');


$postdata = json_decode(file_get_contents('php://input'), true);

if(isset($postdata['CouponCode']) && $postdata['CouponCode'] != ""){
    // $array = array("Test"=>"Rubish");
    // echo json_encode($array,JSON_PRETTY_PRINT);
    $coupon_code = $postdata['CouponCode'];
    global $woocommerce;
    $coupon = new WC_Coupon($coupon_code);
    $couponC = json_decode($coupon,true);
    // echo "<br><br>CouponData<br>";
    
    // print_r($couponC);
    // print_r($coupon);

    $couponArray = [];
    $couponArray['CouponId'] = $couponC['id'];
    $couponArray['CouponAmount'] = $couponC['amount'];
    // $couponArray['CouponExpires'] = $couponC['amount'];
    $couponArray['CouponExpiresOn'] = $couponDateExpires = $couponC['date_expires']['date'];

    $currentData = date("Y-m-d");
    $datetime1 = date_create($couponDateExpires);
    $datetime2 = date_create($currentData);
    $interval = date_diff($datetime1, $datetime2);
    $t =  intval( $interval->format('%R%a') );

    if($t >= 0){
        $response['message'] = "Coupon Expired";
        $response['status'] = false;
        $response['ExpiredDaysAgo'] = $t." Days Ago";
        $response['Code'] = $coupon_code;

    }else {
        $response['message'] = "Sucess";
        $response['Code'] = $coupon_code;
        $response['status'] = true;
        $response['RemainingDays'] = $t." Days";        
        $response['result'] = $couponArray;        
    }

    // $couponExpiryDate =  json_decode($couponDateExpires,true);
    // $couponArray['CouponDate'] = $couponExpiryDate;
    // print_r($couponArray);
    // // echo "<br>";
    // // echo "<br>";
    // echo $couponDate =  $couponExpiryDate;
    // echo "_";
    // echo $currentData = date("Y-m-d");
    // echo "<br>";echo "<br>";echo "<br>";echo "<br>";
    // $datetime1 = date_create($couponDate);
    // $datetime2 = date_create($currentData);
    // $interval = date_diff($datetime1, $datetime2);
    // echo $t =  $interval->format('%R%a');
    // var_dump($t);
    // echo "<br>";echo "<br>";
}
echo json_encode($response, JSON_PRETTY_PRINT);
?>