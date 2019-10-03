<?php 

add_filter('woocommerce_add_cart_item_data', 'add_items_default_price_as_custom_data', 20, 3 );
function add_items_default_price_as_custom_data( $cart_item_data, $product_id, $variation_id ){

    ## Your settings her below ##
    $product_ids = array(37); // <=== Your specific product(s) ID(s) in the array
    $discounted_price = 12; // <=== The specific product discounted price

    $product = wc_get_product($variation_id > 0 ? $variation_id : $product_id);

    if( array_intersect( $product_ids, array($product_id, $variation_id) ) && ! $product->is_on_sale() ){
        // We set the Product discounted price
        $cart_item_data['pricing']['discounted'] = $discounted_price;

        // The WC_Product Object

        // Set the Product default base price as custom cart item data
        $cart_item_data['pricing']['active'] = $product->get_price();
    }

    return $cart_item_data;
}

// Display the product original price
add_filter('woocommerce_cart_item_price', 'display_cart_items_default_price', 20, 3 );
function display_cart_items_default_price( $product_price, $cart_item, $cart_item_key ){
    if( isset($cart_item['pricing']['active']) && $cart_item['quantity'] > 1 ) {
        $product_price  = wc_price( wc_get_price_to_display( $cart_item['data'], array( 'price' => $cart_item['pricing']['active'] ) ) );
    }
    return $product_price;
}

// Display the product name with the a custom "discount" label
add_filter( 'woocommerce_cart_item_name', 'append_custom_label_to_item_name', 20, 3 );
function append_custom_label_to_item_name( $product_name, $cart_item, $cart_item_key ){
    if( isset($cart_item['pricing']['discounted']) && $cart_item['data']->get_price() != $cart_item['pricing']['discounted'] ) {
        $discounted_price = (float) $cart_item['pricing']['discounted'];
        $default_price    = (float) $cart_item['pricing']['active'];
        $quantity         = (int)   $cart_item['quantity'];

        // Calculate new product price
        $new_price = ($default_price + ($discounted_price * ($quantity - 1))) / $quantity;

        // Get the discount percentage (if needed)
        $percent = 100 - ($new_price / $default_price * 100);

        $product_name .= ' <em>(' . __('quantity discounted', 'woocommerce') . ')</em>';
    }
    return $product_name;
}

// Set the new discounted price
add_action( 'woocommerce_before_calculate_totals', 'set_custom_discount_cart_item_price', 25, 1 );
function set_custom_discount_cart_item_price( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;

    foreach( $cart->get_cart() as $cart_item ){

        // For items non on sale set a discount based on quantity
        if( isset($cart_item['pricing']['discounted']) && $cart_item['quantity'] > 1 ) {
            $discounted_price = (float) $cart_item['pricing']['discounted'];
            $default_price    = (float) $cart_item['pricing']['active'];
            $quantity         = (int)   $cart_item['quantity'];

            // Calculate new product price
            $new_price = ($default_price + ($discounted_price * ($quantity - 1))) / $quantity;

            // Set cart item calculated price
            $cart_item['data']->set_price($new_price);
        }
    }
}   