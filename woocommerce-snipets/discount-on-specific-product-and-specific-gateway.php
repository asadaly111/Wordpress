<?php 
/**
 * Plugin Name: Discount on specific gateway and specific product
 * Description: Description
 * Plugin URI: http://#
 * Author: Author
 * Author URI: http://#
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: text-domain
 * Domain Path: domain/path
 */

/*
    Copyright (C) Year  Author  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



add_action( 'woocommerce_review_order_before_payment', 'bbloomer_refresh_checkout_on_payment_methods_change' );
function bbloomer_refresh_checkout_on_payment_methods_change(){
	?>
	<script type="text/javascript">
		(function(){
			jQuery( 'form.checkout' ).on( 'change', 'input[name^="payment_method"]', function() {
				jQuery('body').trigger('update_checkout');
			});
		})(jQuery);
	</script>
	<?php
}


add_action( 'woocommerce_cart_calculate_fees','new_customers_discount', 10, 1 );
function new_customers_discount( $cart  ) {

    // if ( is_admin() && ! defined('DOING_AJAX') ) return; // We exit
    // Only for logged in users
    // if ( ! is_user_logged_in() ) return; // We exit

    // Only for new customers without orders
    // if ( wc_get_customer_order_count( get_current_user_id() ) != 0 ) return;  // We exit

    // Set HERE your categories (can be term IDs, slugs or names) in a coma separated array
    // $product = array('', '', '', '', '', '');

    $fee_amount = 0;

    $discount = 0;
    // Loop through cart items


    foreach( $cart->get_cart() as $cart_item ){
    	switch ($cart_item['product_id']) {
    		case 2582:
    		$fee_amount = 10;
    		$discount += $cart_item['line_subtotal']*$fee_amount/100;
    		break;
    		case 2591:
    		$fee_amount = 10;
    		$discount += $cart_item['line_subtotal']*$fee_amount/100;
    		break;
    	}
    }

    $chosen_gateway = WC()->session->chosen_payment_method;
    
    if ( $chosen_gateway == 'cod' ) {
    	if ( $fee_amount > 0 ){
    		// $discount = $cart->cart_contents_total * ($fee_amount / 100);
    		$cart->add_fee( __( 'Discount On EasyPaisa Mobile Account', 'woocommerce'), -$discount );
    	}
    }
}