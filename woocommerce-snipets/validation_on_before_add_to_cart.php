<?php 

// Add to car validation
function add_the_date_validation( $passed ) { 
if ( empty( $_REQUEST['series'] )) {
    wc_add_notice( __( 'This field is required!', 'woocommerce' ), 'error' );
    $passed = false;
}
return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'add_the_date_validation', 10, 5 );  