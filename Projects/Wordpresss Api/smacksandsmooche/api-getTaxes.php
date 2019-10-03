<?php require_once("wp-load.php");
// define('WP_DEBUG', true); ?>
<?php  header('Content-Type: application/json');?>
<?php
// error_reporting(1);
$response = array('status'=>false, 'message'=>'Something Went Wrong');


// $postdata = json_decode(file_get_contents('php://input'), true);

// if(isset($postdata['State']) && $postdata['State'] != ""){
//     // $array = array("Test"=>"Rubish");
//     // echo json_encode($array,JSON_PRETTY_PRINT);
//     $state = $postdata['State'];
    $array = WC_Shipping_Rate::get_taxes();
    $response['result'] = $array;
    $response['status'] = true;
    $response['message'] = "Test";

// }
echo json_encode($response, JSON_PRETTY_PRINT);
?>