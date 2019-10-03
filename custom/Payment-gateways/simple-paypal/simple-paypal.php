<?php  
$sandbox = true;
$url = $sandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
$email = $sandbox ? 'test@test.com' : 'simonchen@silkroadtradinginc.com';
echo '
<form name="_xclick" action="'.$url.'" method="post" style="margin: 20px 0px 20px 0px;" id="my-form-paypalll">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="'.$email.'">
<input type="hidden" name="item_name" value="'.$_POST['item']['dsc'].'">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden"  name="amount" value="'.$_POST['item']['amount'].'"> 

<input type="hidden" name="first_name" value="'. $_POST['payment']['firstname'].'">
<input type="hidden" name="last_name" value="'.$_POST['payment']['lastname'].'">
<input type="hidden" name="address1" value="'.$_POST['billing']['billing_street1'].'">
<input type="hidden" name="city" value="'.$_POST['billing']['billing_city'].'">
<input type="hidden" name="state" value="'.$_POST['billing']['billing_zone'].'">
<input type="hidden" name="zip" value="'.$_POST['billing']['billing_zone'].'">
<input type="hidden" name="night_phone_a" value="'.$_POST['billing']['billing_phone'].'">
<input type="hidden" name="email" value="'.$_POST['billing']['primary_email'].'">

<input type="hidden" name="return" value="'.site_url('/success/?paypal='.$lastid).'">
<p>Redirecting to Paypal....</p>
<input type="image" src="'.site_url().'/wp-content/uploads/2018/04/loading.gif" name="PP-submit" alt="Make a donation with PayPal"><br>
</form>
';


$sandbox = false;
$url = $sandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
$email = $sandbox ? 'test@test.com' : 'info@oopsydaisydaycare.co.uk';
echo '
<form id="paypalform" name="_xclick" action="'.$url.'" method="post" style="visibility: hidden;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="'.$email.'">

<div class="append"></div>


</form>
';