<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Max-Age: 86400'); // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS,PUT");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  exit(0);
}

header('Content-Type: application/json');

define("AUTHORIZENET_LOG_FILE","phplog");

$postdata = json_decode(file_get_contents('php://input'), true);

if($postdata){
  if (!array_key_exists('CardNumber', $postdata)){
    http_response_code(404);
    echo json_encode('CardNumber required!');
    die();
  }else if (!array_key_exists('CardCVV', $postdata)){
    http_response_code(404);
    echo json_encode('CardCVV required!');
    die();
    
  }else if (!array_key_exists('ExpirationDate', $postdata)){
    http_response_code(404);
    echo json_encode('ExpirationDate required!');
    die();
  }else if (!array_key_exists('Amount', $postdata)){
    http_response_code(404);
    echo json_encode('Amount required!');
    die();
  } else{




$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();

// sandbox
$merchantAuthentication->setName('3nnr6nC8Wrc');
$merchantAuthentication->setTransactionKey('6F5t36q9dU5y54A8');

// live
// $merchantAuthentication->setName('3zN58GzaMGj');
// $merchantAuthentication->setTransactionKey('3842SHuMdA98bsJK');
// Set the transaction's refId
$refId = 'ref' . time();
// Create the payment data for a credit card
$creditCard = new AnetAPI\CreditCardType();
$creditCard->setCardNumber($postdata['CardNumber']);
$creditCard->setExpirationDate($postdata['ExpirationDate']);
$creditCard->setCardCode($postdata['CardCVV']);
// Add the payment data to a paymentType object
$paymentOne = new AnetAPI\PaymentType();
$paymentOne->setCreditCard($creditCard);
// Create order information
// Set the customer's Bill To address
$customerAddress = new AnetAPI\CustomerAddressType();
// $customerAddress->setFirstName('Alexander');
// $customerAddress->setLastName('Fonseca');
// $customerAddress->setCompany("Code Bucket");
// $customerAddress->setAddress('4138 Derek Drive');
// $customerAddress->setCity('Youngstown');
// $customerAddress->setState('Ohio');
// $customerAddress->setZip('44503');
// $customerAddress->setCountry('US');
// Set the customer's identifying information
$customerData = new AnetAPI\CustomerDataType();
$customerData->setType("individual");
$customerData->setId(rand('111111111','99999999'));
// $customerData->setEmail('asadaly111@gmail.com');
// Add values for transaction settings
// Add some merchant defined fields. These fields won't be stored with the transaction,
// but will be echoed back in the response.
// Create a TransactionRequestType object and add the previous objects to it
$transactionRequestType = new AnetAPI\TransactionRequestType();
$transactionRequestType->setTransactionType("authOnlyTransaction");
$transactionRequestType->setAmount($postdata['Amount']);
$transactionRequestType->setPayment($paymentOne);
$transactionRequestType->setBillTo($customerAddress);
$transactionRequestType->setCustomer($customerData);
// Assemble the complete transaction request
$request = new AnetAPI\CreateTransactionRequest();
$request->setMerchantAuthentication($merchantAuthentication);
$request->setRefId($refId);
$request->setTransactionRequest($transactionRequestType);
// Create the controller and get the response
$controller = new AnetController\CreateTransactionController($request);
// $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

// echo '<pre/>';
// print_r($response);
// die;


if ($response != null){
// Check to see if the API request was successfully received and acted upon
  if ($response->getMessages()->getResultCode()){
// Since the API request was successful, look for a transaction response
// and parse it to display the results of authorizing the card
    $tresponse = $response->getTransactionResponse();
    if ($tresponse != null && $tresponse->getMessages() != null){
// echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
// echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
// echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
// echo " Auth Code: " . $tresponse->getAuthCode() . "\n";


      http_response_code(200);
      echo json_encode(['msg' => $tresponse->getMessages()[0]->getDescription(), 'transaction_response_code' => $tresponse->getResponseCode(), 'Auth_Code' => $tresponse->getAuthCode() , 'transaction_id' => $tresponse->getTransId()  ]);
      die();
      

    }else{

      $errorMessages = $response->getMessages()->getMessage();
      // return ['response' => 'error','message' => $errorMessages[0]->getCode() . " " .$errorMessages[0]->getText()];


        http_response_code(404);
        echo json_encode("Transaction Failed: " . $errorMessages[0]->getText() );
        die();
      
    }
// Or, print errors if the API request wasn't successful
  } else{

    $errorMessages = $response->getMessages()->getMessage();
    http_response_code(404);
    echo json_encode("Transaction Failed: " . $errorMessages[0]->getText() );
    
    
  }
} else {
  http_response_code(404);
  echo json_encode("No response returned");
  die();
}

  }
}