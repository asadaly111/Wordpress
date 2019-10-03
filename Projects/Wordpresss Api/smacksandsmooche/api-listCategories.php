<?php require_once("wp-load.php"); ?>
<?php header('Content-Type: application/json'); 
$response = array('status'=>false, 'message'=>'Something Went Wrong');

$orderby = 'name';
$order = 'asc';
$hide_empty = false ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);
 
$product_categories = get_terms( 'product_cat', $cat_args );
$product_categories = json_decode(json_encode($product_categories), true);
if( !empty($product_categories) ){
    foreach ($product_categories as $key => $value) {
    	// $imageUrl = wp_get_attachment_url($value['term_id']);
        $thumbnail_id = get_woocommerce_term_meta( $value['term_id'], 'thumbnail_id', true ); 
        // get the image URL
        $image = wp_get_attachment_url( $thumbnail_id ); 
    	$product_categories[$key]['image'] = $image;
    	
    }
    $response = array('status'=>true, 'categories'=>$product_categories);
    // foreach ($product_categories as $key => $category) {
    // }
}else {
	$response = array('status'=>true, 'message'=>"No Categories Found");
}

echo json_encode($response, JSON_PRETTY_PRINT );
?>