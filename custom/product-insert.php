<?php

$post = array(
    'post_author' => $user_id,
    'post_content' => '',
    'post_status' => "publish",
    'post_title' => $product->part_num,
    'post_parent' => '',
    'post_type' => "product",
);

//Create post
$post_id = wp_insert_post( $post, $wp_error );
if($post_id){
    $attach_id = get_post_meta($product->parent_id, "_thumbnail_id", true);
    add_post_meta($post_id, '_thumbnail_id', $attach_id);
}

wp_set_object_terms( $post_id, 'Races', 'product_cat' );
wp_set_object_terms($post_id, 'simple', 'product_type');

update_post_meta( $post_id, '_visibility', 'visible' );
update_post_meta( $post_id, '_stock_status', 'instock');
update_post_meta( $post_id, 'total_sales', '0');
update_post_meta( $post_id, '_downloadable', 'yes');
update_post_meta( $post_id, '_virtual', 'yes');
update_post_meta( $post_id, '_regular_price', "1" );
update_post_meta( $post_id, '_sale_price', "1" );
update_post_meta( $post_id, '_purchase_note', "" );
update_post_meta( $post_id, '_featured', "no" );
update_post_meta( $post_id, '_weight', "" );
update_post_meta( $post_id, '_length', "" );
update_post_meta( $post_id, '_width', "" );
update_post_meta( $post_id, '_height', "" );
update_post_meta($post_id, '_sku', "");
update_post_meta( $post_id, '_product_attributes', array());
update_post_meta( $post_id, '_sale_price_dates_from', "" );
update_post_meta( $post_id, '_sale_price_dates_to', "" );
update_post_meta( $post_id, '_price', "1" );
update_post_meta( $post_id, '_sold_individually', "" );
update_post_meta( $post_id, '_manage_stock', "no" );
update_post_meta( $post_id, '_backorders', "no" );
update_post_meta( $post_id, '_stock', "" );

// file paths will be stored in an array keyed off md5(file path)
$downdloadArray =array('name'=>"Test", 'file' => $uploadDIR['baseurl']."/video/".$video);

$file_path =md5($uploadDIR['baseurl']."/video/".$video);


$_file_paths[  $file_path  ] = $downdloadArray;
// grant permission to any newly added files on any existing orders for this product
// do_action( 'woocommerce_process_product_file_download_paths', $post_id, 0, $downdloadArray );
update_post_meta( $post_id, '_downloadable_files', $_file_paths);
update_post_meta( $post_id, '_download_limit', '');
update_post_meta( $post_id, '_download_expiry', '');
update_post_meta( $post_id, '_download_type', '');
update_post_meta( $post_id, '_product_image_gallery', '');
