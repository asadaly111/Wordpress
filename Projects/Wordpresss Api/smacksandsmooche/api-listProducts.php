<?php require_once("wp-load.php"); ?>
<?php header('Content-Type: application/json');?>
<?php
error_reporting(1);
$GLOBALS[''] = something;
$response = array('status'=>false, 'message'=>'Something Went Wrong');

// function get_cat_slug($cat_id) {
//     $cat_id = (int) $cat_id;
//     $category = get_category($cat_id);
//     return $category->slug;
// }
function woocommerceCategorySlug( $id ){
    $term = get_term_by('id', $id, 'product_cat', 'ARRAY_A');
    return $term['slug'];       
}

$args['post_type'] = 'product';
$args['posts_per_page'] = -1;
if(isset($_GET['catid'])){

    $args['product_cat'] = woocommerceCategorySlug($_GET['catid']);
    if(woocommerceCategorySlug($_GET['catid']) == false){
        $response = array('status'=>false, 'message'=>"No Products Found"); 
        echo json_encode($response, JSON_PRETTY_PRINT );
        die();
    }
}

// $args = array( 'post_type' => 'product', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
$products = [];

if($loop->have_posts()){
    while ( $loop->have_posts() ) : $loop->the_post();
        // global $product;
        $product_array = $loop->post;
        $images = array();
        $product = new WC_product($product_array->ID);
        $attachment_ids = $product->get_gallery_attachment_ids();
        foreach( $attachment_ids as $attachment_id ){
            $images[] = wp_get_attachment_url( $attachment_id );
        }

        $product_array = json_decode(json_encode($product_array),true);
            
        $product_array['featured_image'] = get_the_post_thumbnail_url($product_array['ID'],'full');
        $product_array['images'] = $images;
        $product_array['reguler_price'] = get_post_meta($product_array['ID'], '_price')[0];
        $product_array['sale_price'] = get_post_meta($product_array['ID'], '_sale_price')[0];
        $product_array['in_stock'] = ((get_post_meta($product_array['ID'], '_stock_status')[0] == 'instock')?true:false);
        
        $product_array['isBundle'] = false;
        $checkId = '"'.$product_array['ID'].'"';

        $searchValue = "'a:1:{i:0;s:3:".$checkId.";}'";
        // $product_array['searchValue'] = $searchValue;
        // $product_array['wpdb'] = $wpdb->postmeta;
        $query = 'SELECT * FROM '.$wpdb->postmeta.' WHERE meta_key = "tm_meta_product_ids" AND meta_value LIKE '.$searchValue;
        // $product_array['query'] =  $query;
        $mylink = $wpdb->get_row($query);
        if($mylink){
            $post_meta = get_post_meta($mylink->post_id, 'tm_meta');
            $product_array['checkboxes_limit_choices'] = $post_meta[0]['tmfbuilder']['checkboxes_limit_choices'][0];
            $count_products = count($post_meta[0]['tmfbuilder']['multiple_checkboxes_options_title'][0]);
            $array = array();
            $i=0;
            foreach($post_meta[0]['tmfbuilder']['multiple_checkboxes_options_title'][0] as $title){
                $array[$i]['key'] = $title.'_'.$i;
                $array[$i]['name'] = $title;
                $array[$i]['image'] = $post_meta[0]['tmfbuilder']['multiple_checkboxes_options_image'][0][$i];
                $i++;
            }
            $product_array['isBundle'] = true;
            $product_array['child'] = $array;
        }



        array_push($products, $product_array);
    endwhile;

    // $response['status'] = true;
    // $response['products'] = $products;
    $response = array('status'=>true,'products'=>$products);        
}
else {
 $response = array('status'=>false, 'message'=>"No Products Found");   
}

echo json_encode($response, JSON_PRETTY_PRINT );
?>