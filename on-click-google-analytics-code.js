<script>
	jQuery(document).ready(function() {
		setTimeout(function() {
			jQuery('input[name="woocommerce_checkout_place_order"]').attr('onclick', "ga('send', {'hitType': 'event', 'eventCategory': 'PayPalRedirect', 'eventAction': 'clickAction', 'eventLabel': 'ProceedToPaypal' });");
		}, 2000);
	});
</script>
