<?php
require '../wp-load.php';
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
$postdata = json_decode(file_get_contents('php://input'), true);
if($postdata){
  if (!array_key_exists('your_name', $postdata)){
    http_response_code(404);
    echo json_encode('Name required!');
    die();
  }else if (!array_key_exists('email', $postdata)){
    http_response_code(404);
    echo json_encode('Email required!');
    die();

  }else if (!array_key_exists('message', $postdata)){
    http_response_code(404);
    echo json_encode('Message required!');
    die();
  }else{





    $headers = array('Content-Type: text/html; charset=UTF-8');
    $to = 'info@tribe228.com';
    $subject = "Contact Form Data";


$message = '
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>2 Column</title>
<style>
body {
width: 100% !important;
margin: 0;
line-height: 1.4;
background-color: #F2F4F6;
color: #74787E;
-webkit-text-size-adjust: none;
}
.email-body{
width:600px;
margin: 0 auto;
}
.button {
background-color: #b70f1b !important;
padding: 10px 0px;
display: block;
color: #FFF !important;
text-align: center;
width: 100% !important;
text-decoration: none;
border-radius: 3px;
box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
-webkit-text-size-adjust: none;
}
/*Media Queries ------------------------------ */
@media only screen and (max-width: 600px) {
.email-body{
width: 100% !important;
}
}
</style>
</head>
<body>
<table width="600" border="0" cellspacing="0" cellpadding="0" class="email-body">
<tbody>
<tr>
<td bgcolor="#ffffff">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td width="10">&nbsp;</td>
<td>&nbsp;</td>
<td width="10">&nbsp;</td>
</tr>
<tr>
<td width="10">&nbsp;</td>
<td align="center"><img src="https://tribe228.com/wp-content/uploads/2018/11/logo.png"></td>
<td width="10">&nbsp;</td>
</tr>
<tr>
<td width="10">&nbsp;</td>
<td>&nbsp;</td>
<td width="10">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td bgcolor="#fff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td width="10">&nbsp;</td>
<td>&nbsp;</td>
<td width="10">&nbsp;</td>
</tr>
<tr>
<td width="10">&nbsp;</td>
<td><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 20px; color: #000;"><strong>Hi admin,</strong></span></td>
<td width="10">&nbsp;</td>
</tr>
<tr>
<td width="10" style="font-size: 12px">&nbsp;</td>
<td style="font-size: 12px">&nbsp;</td>
<td width="10" style="font-size: 12px">&nbsp;</td>
</tr>
<tr>
<td width="10">&nbsp;</td>
<td><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; color: #000;">You have received an inquiry.</span></td>
<td width="10">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ffffff">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td width="10">&nbsp;</td>
<td>&nbsp;</td>
<td width="10">&nbsp;</td>
</tr>
<tr>
<td width="10">&nbsp;</td>
<td><table width="100%" border="1" cellspacing="0" cellpadding="5"  class="email-body">
<tbody>
<tr>
<td width="150" valign="top"><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 14px; color: #000;">Name</span></td>
<td  valign="top"><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 14px; color: #000;">'.$postdata['your_name'].'</span></td>
</tr>
<tr>
<td width="150" valign="top"><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 14px; color: #000;">Email</span></td>
<td  valign="top"><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 14px; color: #000;">'.$postdata['email'].'</span></td>
</tr>
<tr>
<td width="150" valign="top"><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 14px; color: #000;">Message</span></td>
<td  valign="top"><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 14px; color: #000;">'.$postdata['message'].'</span></td>
</tr>
</tbody>
</table></td>
<td width="10">&nbsp;</td>
</tr>
<tr>
<td width="10">&nbsp;</td>
<td>&nbsp;</td>
<td width="10">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ccc"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td width="10" style="font-size: 12px">&nbsp;</td>
<td style="font-size: 12px">&nbsp;</td>
<td width="10" style="font-size: 12px">&nbsp;</td>
</tr>
<tr>
<td width="10">&nbsp;</td>
<td align="center"><span style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size:12px; color: #000;">
&copy; TRIBE. All rights reserved.<br>
<br>
</span></td>
<td width="10">&nbsp;</td>
</tr>
<tr>
<td width="10" style="font-size: 12px">&nbsp;</td>
<td style="font-size: 12px">&nbsp;</td>
<td width="10" style="font-size: 12px">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
</body>
</html>
';








    wp_mail($to, $subject,$message, $headers);
    $data = 'Your request has been submitted!';
    print(json_encode($data));


  }
}