<?php
do_action( 'lms_scripts');
global $ChinaBrand;
$prodcts = $ChinaBrand->show_all_download_product_list();
$objProduct = new WC_Product();


// foreach ($prodcts->msg->page_result as $key) {
// 	$productdetail = $ChinaBrand->show_product_by_id($key->goods_sn);
// 	$i = 0;
// 	foreach ($productdetail->msg as $key) {


// 		$price = '';
// 		$mm  = (array) $key->warehouse_list;
// 		if(count($mm) > 0){
// 			foreach ($mm as $aaa => $value) {
// 				$price = $value->price;
// 			}
// 		}
// 		echo $price = $price;

// 		echo "<pre>";
// 		print_r($key);
// 		echo "</pre>";


// 	}
// }



// die('ends here');




foreach ($prodcts->msg->page_result as $key) {
	$productdetail = $ChinaBrand->show_product_by_id($key->goods_sn);

	
	$i = 0;
	foreach ($productdetail->msg as $key) {

		if ($key->status != 1) {
			continue;
		}


		$price = '';
		$mm  = (array) $key->warehouse_list;
		if(count($mm) > 0){
			foreach ($mm as $aaa => $value) {
				$price = $value->price;
			}
		}
		$price = $price;

		if (count($productdetail->msg) > 1) {

			if ($i == 0) {
				$objProduct = new WC_Product_Variable();

				
				$objProduct->set_name($key->title);
				$objProduct->set_status("publish");  // can be publish,draft or any wordpress post status
				$objProduct->set_catalog_visibility('visible'); // add the product visibility status
				$objProduct->set_sku($key->sku); //can be blank in case you don't have sku, but You can't add duplicate sku's
				$objProduct->set_price($price); // set product price
				$objProduct->set_regular_price($price); // set product regular price
				$objProduct->set_manage_stock(true); // true or false
				$objProduct->set_stock_quantity(1000);
				$objProduct->set_stock_status('instock'); // in stock or out of stock value
				$objProduct->set_backorders('no');
				$objProduct->set_reviews_allowed(true);
				$objProduct->set_sold_individually(false);
				$product_id = $objProduct->save();


				$firstimg  = $key->original_img[0];
				$attachmentid =  Generate_Featured_Image2($firstimg, $product_id);
				update_post_meta( $product_id, '_thumbnail_id', $attachmentid);


				$attributes = array(
					array("name"=>"Size","options"=>array("S","L","XL","XXL"),"position"=>1,"visible"=>1,"variation"=>1),
					array("name"=>"Color","options"=>array("Red","Blue","Black","White"),"position"=>2,"visible"=>1,"variation"=>1)
				);

				if($attributes){
					$productAttributes=array();
					foreach($attributes as $attribute){
						$attr = wc_sanitize_taxonomy_name(stripslashes($attribute["name"]));
						$attr = 'pa_'.$attr; 
						if($attribute["options"]){
							foreach($attribute["options"] as $option){
								wp_set_object_terms($product_id,$option,$attr,true); 
							}
						}
						$productAttributes[sanitize_title($attr)] = array(
							'name' => sanitize_title($attr),
							'value' => $attribute["options"],
							'position' => $attribute["position"],
							'is_visible' => $attribute["visible"],
							'is_variation' => $attribute["variation"],
							'is_taxonomy' => '1'
						);
					}
					update_post_meta($product_id,'_product_attributes',$productAttributes); 
				}

				 wp_set_object_terms( $product_id, 'Banggoods', 'supplier', true);


				$i++;
			}else{
				
			$firstimg  = $key->original_img[0];
			$attachmentid =  Generate_Featured_Image2($firstimg, $product_id);

			// The variation data
			$variation_data =  array(
			    'attributes' => array(
			        'size'  => $key->size,
			        'color' => $key->color,
			    ),
			    'sku'           => $key->sku,
			    'regular_price' => $price,
			    'sale_price'    => $price,
			    'stock_qty'     => 1000,
			    'featureimg' 	=> $attachmentid,
			);
			// The function to be run
			create_product_variation( $product_id, $variation_data );


			// $sku = $key->sku;
			// $objVariation = new WC_Product_Variation();
			// $objVariation->set_price($key->warehouse_list->SZXIAWAN->price);
			// $objVariation->set_regular_price($key->warehouse_list->SZXIAWAN->price);
			// $objVariation->set_parent_id($product_id);
			// if(isset($sku)){
			// 	$objVariation->set_sku($sku);
			// }
			// // $objVariation->set_manage_stock($variation["manage_stock"]);
			// $objVariation->set_stock_status('instock');
			// $var_attributes = array();

			// if (!empty($key->size)) {
			// 	$taxonomy = "pa_".wc_sanitize_taxonomy_name(stripslashes('Size'));
			// 	$attr_val_slug =  wc_sanitize_taxonomy_name(stripslashes($key->size));
			// 	$var_attributes[$taxonomy]=$attr_val_slug;
			// }
			// if (!empty($key->color)) {

			// 	$taxonomy = "pa_".wc_sanitize_taxonomy_name(stripslashes('Color'));
			// 	$attr_val_slug =  wc_sanitize_taxonomy_name(stripslashes($key->color));
			// 	$var_attributes[$taxonomy]=$attr_val_slug;
			// }
			// $objVariation->set_attributes($var_attributes);
			// $objVariation->save();

				$i++;
			}



















		}else{
			$title =  $key->title;
			$discription = $key->goods_desc;
			$firstimg  = $key->original_img[0];
			// $price = $price;
			$sku = $key->sku;;
			// echo $key->original_img[0];
			$product['post_title']    = $title;
			$product['post_author']   = '1';
			$product['post_type']     = 'product';
			$product['post_content']  = $discription;
			$product['post_status']   = "publish";
			$post_id = wp_insert_post( $product);
			$attachmentid =  Generate_Featured_Image2($firstimg, $post_id);
			update_post_meta( $post_id, '_thumbnail_id', $attachmentid);
			update_post_meta( $post_id , '_regular_price', $price);
			update_post_meta( $post_id , '_price', $price);
			update_post_meta( $post_id , '_sku', $sku); // outofstock
			update_post_meta( $post_id , '_stock_status', 'instock'); // outofstock
			update_post_meta( $post_id , '_weight', "" );
			update_post_meta( $post_id , '_visibility', 'visible' );
			update_post_meta( $post_id , '_sold_individually', 'no' );
			update_post_meta( $post_id , '_backorders', 'no' );
			update_post_meta( $post_id , '_manage_stock', 'yes' );
			update_post_meta( $post_id , '_product_version', '' );
			update_post_meta( $post_id , '_product_image_gallery', '' );
			update_post_meta( $post_id , '_wc_review_count', '0' );
			update_post_meta( $post_id , '_wc_average_rating', '0' );

			wp_set_object_terms( $product_id, 'Banggoods', 'supplier', true);
			
			echo '
			<div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			This Simple product has been uploaded successfully! <a href="'.get_the_permalink($post_id).'" class="alert-link">'.get_the_permalink($post_id).'</a>.
			</div>
			';
		}
	}
}



