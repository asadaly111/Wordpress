<?php /* Template Name: Login API PAGE */ ?>
<?php require_once("wp-load.php"); ?>
<?php // require_once("../public_html/wp-blog-header.php"); ?>


<?php
	$s = isset($_GET['s']) ? $_GET['s'] : "";
    $args = array( 'post_type' => 'product', 's' => $s );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
<?php 
//echo "<pre>";
//print_r((array) $product);
//$newProduct =array();
$productarray = (array) $product;
//print_r($productarray);
foreach($productarray as $key => $productss)
{

$key = str_replace('*','',$key);	
if(trim($key) == "data"){

$newProduct= $productss;

}
}

//$newProduct;

	$random['id'] = $product->id;
	$random['title'] = $product->post->post_title;
$random['description'] = $product->post->post_content;
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$random['featured_src'] = $image[0];
	$random['images'][]['src'] = $image[0];
$terms = get_the_terms( $post->ID, 'product_cat' );
    if ( $terms && ! is_wp_error( $terms ) ){
    //only displayed if the product has at least one category
        $cat_links = array();
        foreach ( $terms as $term ) {
            $cat_links[] = $term->name;
        }
        $random['categories'] = join( " ", $cat_links );
}
	$price_html = price_array($product->get_price_html());
	$random['price_html'] = $price_html;
	$random['price'] = $newProduct['price'];
$random['in_stock'] = $product->is_in_stock();
	$gallery = $product->get_gallery_attachment_ids();
	//print_r($gallery);
	$randomproduct['results'][] = $random;
 ?>
<?php endwhile; ?>
<?php wp_reset_query();

function price_array($price){
    $del = array('<span class="amount">', '</span>');
    $price = str_replace($del, '', $price);
    $price = str_replace('.&nbsp;', ' ', $price);
    $price_arr = explode('|', $price);
    // $price_arr = array_filter($price_arr);
    return $price_arr[0];
}

if(empty($randomproduct['results'])){
$randomproduct['status'] = 0;
$randomproduct['message'] = "ERROR";
}else{
$randomproduct['status'] = 1;
$randomproduct['message'] = "Done";
}

echo json_encode($randomproduct);
 ?>