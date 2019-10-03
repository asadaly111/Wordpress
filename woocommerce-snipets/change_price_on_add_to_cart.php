<?php 

add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' );
function add_custom_price( $cart_object ) {
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {    
        if ($cart_item['product_id'] == 30) {
            if (isset($cart_item['amount'])) {
                $cart_item['data']->set_price($cart_item['amount']);   
            }
        }
    }
}
