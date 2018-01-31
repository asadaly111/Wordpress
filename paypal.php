<?php
$sandbox = true;
$url = $sandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
$email = $sandbox ? 'test@test.com' : 'donations@your-web-domain.com';
?>
<form name="_xclick" action="<?php echo $url; ?>" method="post" style="margin: 20px 0px 20px 0px;">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="<?php echo $email; ?>">
	<input type="hidden" name="item_name" value="Donation for website">
	<input type="hidden" name="currency_code" value="USD">
	<select name="amount" style="margin: 0px 0px 11px 0px;">
		<option selected value="10.00">Please Select Amount</option>
		<option value="10.00">$10.00</option>
		<option value="25.00">$25.00</option>
		<option value="50.00">$50.00</option>
		<option value="100.00">$100.00</option>
	</select><br>
	<input type="hidden" name="return" value="http://your-web-domain.com/thanks-pp.htm">
	<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="PP-submit" alt="Make a donation with PayPal"><br>
</form>
