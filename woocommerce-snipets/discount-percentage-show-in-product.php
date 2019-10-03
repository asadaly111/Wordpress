<?php 
/**
 * @snippet       Display Discount Percentage @ Loop Pages - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=21997
 * @author        Rodolfo Melogli
 * @compatible    WC 3.1.0
 */

add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_show_sale_percentage_loop', 25 );

function bbloomer_show_sale_percentage_loop() {
   
    global $product;
    
    if ( $product->is_on_sale() ) {
       
        if ( ! $product->is_type( 'variable' ) ) {
           
            $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
            
        } else {
           
            $max_percentage = 0;
            
            foreach ( $product->get_children() as $child_id ) {
                $variation = wc_get_product( $child_id );
                $price = $variation->get_regular_price();
                $sale = $variation->get_sale_price();
                if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
                if ( $percentage > $max_percentage ) {
                    $max_percentage = $percentage;
                }
            }
            
        }
        
        echo "<div class='sale-perc'>-" . round($max_percentage) . "%</div>";
        
    }
    
}