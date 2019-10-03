<?php
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



$data[] = [
    'title' => 'Tops & Dress',
    'SIZE' => ['XXS', 'XS', 'S', 'M', 'L', 'XL'],
    'US/CAN' => ['0', '2', '4,6', '8,10', '12,14', '16,18'],
    'BUST(in)' => ['31-31', '32-33', '33-34', '35-36', '38-39', '41-42'],
    'WAIST(in)' => ['25-26', '26-27', '27-28', '29-30', '33-34', '35-36'],
    'HIPS(in)' => ['35-36', '35-37', '37-38', '39-40', '41-42', '45'],
    'UK' => ['-', '2,4', '6,8', '10,12', '14,16', '18'],
    'EU' => ['-', '32,34', '36,38', '40,42', '44,46', '48'],
 ];




$data[] = [
  'title' =>  'Bottoms & Skirts',
  'SIZE' => ['XXS', 'XS', 'S', 'M', 'L', 'XL'],
  'US/CAN' => ['0', '2', '4,6', '8,10', '12,14', '16,18'],
  'WAIST(in)' => ['24', '24-25', '26-27', '28-29', '30-31', '32-33'],
  'HIPS(in)' => ['33', '33-34', '35-37', '38-40', '41-42', '43-44'],
  'UK' => ['-', '2,4', '6,8', '10,12', '14,16', '18,20'],
  'EU' => ['-', '32,34', '36,38', '40,42', '44,46', '46,48'],
];



print(json_encode($data));

