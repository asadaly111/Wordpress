<?php
require 'vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;


$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
$merchantAuthentication->setName('3nnr6nC8Wrc');
$merchantAuthentication->setTransactionKey('6F5t36q9dU5y54A8');
// Set the transaction's refId
$refId = 'ref' . time();
// Create the payment data for a credit card
$creditCard = new AnetAPI\CreditCardType();
$creditCard->setCardNumber('4007000000027');
$creditCard->setExpirationDate('2019-12');
$creditCard->setCardCode('123');
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
$transactionRequestType->setAmount(250);
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
$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
if ($response != null){
// Check to see if the API request was successfully received and acted upon
  if ($response->getMessages()->getResultCode()){
// Since the API request was successful, look for a transaction response
// and parse it to display the results of authorizing the card
    $tresponse = $response->getTransactionResponse();
    if ($tresponse != null && $tresponse->getMessages() != null)
    {
// echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
// echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
// echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
// echo " Auth Code: " . $tresponse->getAuthCode() . "\n";


      http_response_code(200);
      echo json_encode(['msg' => $tresponse->getMessages()[0]->getDescription(), 'transaction_response_code' => $tresponse->getResponseCode(), 'Auth_Code' => $tresponse->getAuthCode() , 'transaction_id' => $tresponse->getTransId()  ]);
      

      die();
    } else
    {
      if ($tresponse->getErrors() != null)
      {
        http_response_code(404);
        echo json_encode("Transaction Failed: " . $tresponse->getErrors()[0]->getErrorText());
        die();
      }
    }
// Or, print errors if the API request wasn't successful
  } else
  {
    $tresponse = $response->getTransactionResponse();
    if ($tresponse != null && $tresponse->getErrors() != null)
    {
      http_response_code(404);
      echo json_encode("Transaction Failed: " . $tresponse->getErrors()[0]->getErrorText());
      die();
    } else
    {
      http_response_code(404);
      echo json_encode("Transaction Failed: " . $response->getMessages()->getMessage()[0]->getText());
      die();
    }
  }
} else {
  http_response_code(404);
  echo json_encode("No response returned");
  die();
}
