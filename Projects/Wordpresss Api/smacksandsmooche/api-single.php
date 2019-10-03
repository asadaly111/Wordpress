<?php require_once("wp-load.php"); ?>
<?php header('Content-Type: application/json');?>
<?php
$id = $_GET['id'];
$response = array();

if(isset($_GET['id'])){
    $the_query = get_post( $id );
    setup_postdata($the_query);




    if($the_query){
        if($the_query->post_type == 'product'){
            $images = array();
            $product = new WC_product($the_query->ID);
            $attachment_ids = $product->get_gallery_attachment_ids();
            foreach( $attachment_ids as $attachment_id ){
                $images[] = wp_get_attachment_url( $attachment_id );
            }

            $custom = array();
            $custom['ID'] = $the_query->ID;
            $custom['post_author'] = $the_query->post_author;
            $custom['post_date'] = $the_query->post_date;
            $custom['post_date_gmt'] = $the_query->post_date_gmt;
            $custom['post_content'] = $the_query->post_content;
            $custom['post_title'] = $the_query->post_title;
            $custom['post_excerpt'] = $the_query->post_excerpt;
            $custom['post_status'] = $the_query->post_status;
            $custom['comment_status'] = $the_query->comment_status;
            $custom['ping_status'] = $the_query->ping_status;
            $custom['post_password'] = $the_query->post_password;
            $custom['post_name'] = $the_query->post_name;
            $custom['featured_image'] = get_the_post_thumbnail_url($the_query->ID,'full');
            $custom['images'] = $images;
            $custom['reguler_price'] = get_post_meta($the_query->ID, '_price')[0];
            $custom['sale_price'] = get_post_meta($the_query->ID, '_sale_price')[0];
            $custom['in_stock'] = ((get_post_meta($the_query->ID, '_stock_status')[0] == 'instock')?true:false);
            $custom['to_ping'] = $the_query->to_ping;
            $custom['pinged'] = $the_query->pinged;
            $custom['pinged'] = $the_query->pinged;
            $custom['post_modified'] = $the_query->post_modified;
            $custom['post_modified_gmt'] = $the_query->post_modified_gmt;
            $custom['post_content_filtered'] = $the_query->post_content_filtered;
            $custom['post_parent'] = $the_query->post_parent;
            $custom['guid'] = $the_query->guid;
            $custom['menu_order'] = $the_query->menu_order;
            $custom['post_type'] = $the_query->post_type;
            $custom['post_mime_type'] = $the_query->post_mime_type;
            $custom['comment_count'] = $the_query->comment_count;
            $custom['filter'] = $the_query->filter;

            $isBundle = false;
            $checkId = '"'.$the_query->ID.'"';
            $searchValue = "'a:1:{i:0;s:3:".$checkId.";}'";
            $mylink = $wpdb->get_row('SELECT * FROM '.$wpdb->postmeta.' WHERE meta_key = "tm_meta_product_ids" AND meta_value LIKE '.$searchValue);
            if($mylink){
                $isBundle = true;
                $post_meta = get_post_meta($mylink->post_id, 'tm_meta');
                $custom['checkboxes_limit_choices'] = $post_meta[0]['tmfbuilder']['checkboxes_limit_choices'][0];
                $count_products = count($post_meta[0]['tmfbuilder']['multiple_checkboxes_options_title'][0]);
                $array = array();
                $i=0;
                foreach($post_meta[0]['tmfbuilder']['multiple_checkboxes_options_title'][0] as $title){
                    $array[$i]['name'] = $title;
                    $array[$i]['image'] = $post_meta[0]['tmfbuilder']['multiple_checkboxes_options_image'][0][$i];
                    $i++;
                }
                $custom['child'] = $array;
            }
            // $response = array('status'=>true, 'result'=>$custom);
            $response['status'] = true;
            if($isBundle){ $response['isBundle'] = true; }else { $response['isBundle'] = false; }
            $response['result'] = $custom;
        }else{
            $response = array('status'=>false, 'message'=>'Product not found!');
        }
    }else{
        $response = array('status'=>false, 'message'=>'Product not found!');
    }

}else{
    $response = array('status'=>false, 'message'=>'ID paramater required!');
}

echo json_encode($response, JSON_PRETTY_PRINT );
?>