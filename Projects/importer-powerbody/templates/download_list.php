<?php
do_action( 'lms_scripts');

if (empty($_GET['startimporter'])):
echo '<br><br><br><br><a class="btn btn-primary" href="admin.php?page=pb_donwload_list&startimporter=true">Start Importing Products</a>';
else:	



global $Powerbody;
$prodcts = $Powerbody->Product_list();


foreach ($prodcts as $key) {

		$title =  $key['name'];
		$discription = $key['description_en'];
		$firstimg  = $key['image'];
		$sku = $key['sku'];
		$price = $key['price_tax'];
		$category = $key['category'];
		$brand = $key['manufacturer'];
		$inventory = $key['qty'];
	
	if (!wp_exist_post_by_title($title)):

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
		update_post_meta( $post_id , '_backorders', 'no' );
		update_post_meta( $post_id , '_sold_individually', '' );

		update_post_meta( $post_id , '_manage_stock', 'yes' );
		update_post_meta( $post_id, '_stock', $inventory);

		update_post_meta( $post_id , '_product_version', '3.7.0');
		update_post_meta( $post_id , '_product_image_gallery', '' );
		update_post_meta( $post_id , '_wc_review_count', '0' );
		update_post_meta( $post_id , '_wc_average_rating', '0' );



		$term1 = term_exists(trim($brand), 'brand_category');
		if ($term1 !== 0 && $term1 !== null) {
			$term_id2 = $term1['term_id'];
		}else{
			$term_d = wp_insert_term(
				trim($brand),
				'brand_category',
				array(
					'description'=> '',
					'parent'=> 0
				)
			);
			$term_id2 = $term_d['term_id'];
		}
		wp_set_object_terms( $post_id, $brand, 'brand_category', true);



		$term = term_exists(trim($category), 'product_cat');
		if ($term !== 0 && $term !== null) {
			$term_id = $term['term_id'];
		}else{
			$term_d = wp_insert_term(
				trim($category),
				'product_cat',
				array(
					'description'=> '',
					'parent'=> 0
				)
			);
			$term_id = $term_d['term_id'];
		}
		wp_set_object_terms( $post_id, $category, 'product_cat', true);


		wp_set_object_terms( $post_id, 'Powerbody', 'supplier', true);

		echo '
		<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		This Simple product has been uploaded successfully! <a href="'.get_the_permalink($post_id).'" class="alert-link">'.get_the_permalink($post_id).'</a>.
		</div>
		';

	else:
		$get = wp_exist_post_by_title($title);

		echo '
		<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		Product already exist! <a href="'.get_the_permalink($get->ID).'" class="alert-link">'.$title.'</a>.
		</div>
		';
	endif;


}



endif;



