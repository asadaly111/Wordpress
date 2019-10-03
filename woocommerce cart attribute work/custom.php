<?php 

// ******************************************************************************

function pr($data = array())
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}


// Adding a custom imput hidden field in add to cart form
function add_gift_wrap_field() {

 




    $content = '';
    $content .= '
<style>
.customclass .souls , .customclass .straps { float: left }
.customclass .souls label , .customclass .straps label { width: 101px; height: 84px !important; text-transform: uppercase; background: #ccc; float: left; text-align: center; margin-right: 10px; margin-bottom: 0px }
.customclass .souls p , .customclass .straps p { text-align: center; font-size: 12px; padding: 0 !important }

</style>
    <table class="variations customclass" cellspacing="0">
            <tbody>
                <tr>
                    <td class="label"><h6 class="tm-epo-field-label tm-has-required"><span class="tm-epo-required">*</span>Pairs</h6></td>
                    <td class="value">
                    <select name="cs_pairs" required> ';

                    $pairs = get_post_meta( get_the_ID(), 'cs_pairs', false );
                    if (!empty($pairs[0])):
                        $pairs =  json_decode($pairs[0] , true);
                        foreach ($pairs['cs_pairs'] as $key => $value) {
                            $pairsss =  explode(',', $value);
                            $content .= ' <option value="'.$pairs['cs_pairs'][$key].'">'.$pairsss[0].'</option> ';
                        }
                    endif;
                    
                   $content .= ' </select>                       
                    </td>
                </tr>   

                <tr>
                <td class="label"><h6 class="tm-epo-field-label tm-has-required"><span class="tm-epo-required">*</span>Soles</h6></td>
                <td class="value">';

                $cs_soul = get_post_meta( get_the_ID(), 'cs_soul', false );
                if (!empty($cs_soul[0])):
                    $cs_soul =  json_decode($cs_soul[0] , true);
                    foreach ($cs_soul['cs_soul'] as $key => $value2) {
                        $soulss =   explode(',', $value2);
                        $content .= '
                        <div class="souls">
                        <label style="background: url('.$soulss[2].');}"><input type="checkbox" name="souls[]" value="'.$soulss[0].','.$soulss[3].'">
                        </label><p>'.$soulss[0].'</p>
                        </div>
                        ';
                    }
                    $content .= '<input type="hidden" name="soul_setup_charges" value="'.$cs_soul['soul_setup_charges'].'">';
                endif;

                


                $content .= '</td>
                </tr>     
                <tr>
                <td class="label"><h6 class="tm-epo-field-label tm-has-required"><span class="tm-epo-required">*</span>Rubber Straps</h6></td>
                <td class="value">';


                $cs_straps = get_post_meta( get_the_ID(), 'cs_straps', false );
                if (!empty($cs_straps[0])):
                    $cs_straps =  json_decode($cs_straps[0] , true);
                    foreach ($cs_straps['cs_strap'] as $key => $value3) {
                        $strapsss =     explode(',', $value3);
                        $content .= '
                        <div class="straps">
                        <label style="background: url('.$strapsss[2].');}"><input type="checkbox" name="straps[]" value="'.$strapsss[0].','.$strapsss[3].'">
                        </label><p>'.$strapsss[0].'</p>
                        </div>
                        ';
                    }
                $content .= '<input type="hidden" name="strap_setup_charges" value="'.$cs_straps['strap_setup_charges'].'">';
                endif;          


               $content .= ' </td>
                </tr>

            </tbody>
        </table>
        ';

        echo $content ;
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_gift_wrap_field' );









function save_gift_wrap_fee( $cart_item_data, $product_id ) {
    if( isset( $_POST['cs_pairs'])) {
            $pair = explode(',', $_POST['cs_pairs']);
            //$pair[0] quantity
            //$pair[1] price
        $cart_item_data[ "Pairs" ]          = $pair[0];     
        $cart_item_data[ "Pairs_price" ]    = $pair[1];     
    }
    if( isset( $_POST['souls'])) {
            //$souls[0] color
            //$souls[1] price
        if (count($_POST['souls']) == 2) {
            foreach ($_POST['souls'] as $key) {
                $souls = explode(',', $key);
                $cart_item_data[ "soul"][]  = [$souls[0],$souls[1]];    
            }
            $cart_item_data["soul_setup_charges"] = $_POST['soul_setup_charges'];    
        }elseif (count($_POST['souls']) == 1) {
            $cart_item_data[ "soul_color" ]     = $_POST['souls'][0];      
        }
    }    
    if( isset( $_POST['straps'])) {
            //$straps[0] color
            //$straps[1] price
        if (count($_POST['straps']) == 2) {
            foreach ($_POST['straps'] as $key) {
                $straps = explode(',', $key);
                $cart_item_data[ "straps"][]    = [$straps[0],$straps[1]];    
            }
            $cart_item_data["strap_setup_charges"]  = $_POST['strap_setup_charges'];    
        }elseif (count($_POST['straps']) == 1) {
            $cart_item_data[ "strap_color" ]    = $_POST['straps'][0];      
        }
    }   
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'save_gift_wrap_fee', 99, 2 );




function render_meta_on_cart_and_checkout( $cart_data, $cart_item = null ) {
    $meta_items = array();
    if( !empty( $cart_data ) ) {
        $meta_items = $cart_data;
    }
    if( isset( $cart_item["Pairs"] ) ) {
        $meta_items[] = array( "name" => "Pairs", "value" => $cart_item["Pairs"]. ' Price ' . $cart_item['Pairs_price']);
    }
    // Soul
    if(isset( $cart_item["soul"] ) ) {
        $ii = 0;
        foreach ($cart_item["soul"] as $key) {
            if ($ii == 0) {
                $meta_items[] = array( "name" => "Soul color & Price", "value" => $key[0]);
                $ii++;
            }else{
                $meta_items[] = array( "name" => "Soul color & Price", "value" => $key[0].' - per pair '.$key[1]);
            }
        }
        $meta_items[] = array( "name" => "Setup Charges for soul", "value" => $cart_item["soul_setup_charges"]);
    }
    if(isset( $cart_item["soul_color"] ) ) {
        $souls = explode(',', $cart_item["soul_color"]);
        $meta_items[] = array( "name" => "Soul color", "value" =>  $souls[0]);
    }


    // Straps
    if(isset( $cart_item["straps"] ) ) {
        $jj = 0;
        foreach ($cart_item["straps"] as $key) {
            if ($jj == 0) {
                $meta_items[] = array( "name" => "Strap color & Price", "value" => $key[0]);
                $jj++;
            } else {
                $meta_items[] = array( "name" => "Strap color & Price", "value" => $key[0].' - per pair '.$key[1]);
            }
            
        }
        $meta_items[] = array( "name" => "Setup Charges for straps", "value" => $cart_item["strap_setup_charges"]);
    }    
    if(isset( $cart_item["strap_color"] ) ) {
        $souls = explode(',', $cart_item["strap_color"]);
        $meta_items[] = array( "name" => "strap color", "value" =>  $souls[0]);
    }    
    return $meta_items;
}
add_filter( 'woocommerce_get_item_data', 'render_meta_on_cart_and_checkout', 99, 2 );




// function gift_wrap_order_meta_handler( $item_id, $values, $cart_item_key ) {
//     if( isset( $values["Pairs"] ) ) {
//         wc_add_order_item_meta( $item_id, "pairs", $values["Pairs"]);
//     }
// }
// add_action( 'woocommerce_add_order_item_meta', 'gift_wrap_order_meta_handler', 99, 3 );




function calculate_cart_total( $cart_object ) {
    foreach ( WC()->cart->get_cart() as $key => $value ) {
        /* Check for the value ( or it could be any condition logic ) */
        /* Each custom field's key would be prefixed with `wccpf_` */      
        $total1 = 0;
        $total2 = 0;
        if (!empty($value["Pairs_price"])) {
            $orgPrice = floatval( $value['data']->get_price() );
            $value['data']->set_price( $value["Pairs_price"] );
        } 
        if (!empty($value["soul"]) && !empty($value["Pairs_price"])) {
            if (count($value["soul"]) > 1) {
                $total1 = $value["Pairs_price"]+( $value["Pairs"]*$value["soul"][0][1])+50;
                $value['data']->set_price($total1);
            }
        }

        if (!empty($value["straps"]) && !empty($value["Pairs_price"])) {
            if (count($value["straps"]) > 1) {
                $total2 = ($value["Pairs"]*$value["straps"][0][1])+95;
                $value['data']->set_price($total1+$total2);
            }
        }
    }
    
}
add_action( 'woocommerce_before_calculate_totals', 'calculate_cart_total', 99 );













/*******************************  Custom fields from here    ****************************************/
function EV_cs_fields_add_meta_box1() {
    add_meta_box(
        'EV_cs_fields_add_meta_box2',
        __( 'Set color of Soul', 'custom_fields' ),
        'EV_custom_sell_ur_car_html2',
        'product',
        'advanced',
        'high'
    );
    add_meta_box(
        'EV_cs_fields_add_meta_box3',
        __( 'Set color of Strap', 'custom_fields' ),
        'EV_custom_sell_ur_car_html3',
        'product',
        'advanced',
        'high'
    );
    add_meta_box(
        'EV_cs_fields_add_meta_box1',
        __( 'Set Pairs price', 'custom_fields' ),
        'EV_custom_sell_ur_car_html1',
        'product',
        'advanced',
        'high'
    );
}
add_action( 'add_meta_boxes', 'EV_cs_fields_add_meta_box1' );
function EV_custom_sell_ur_car_html1(){
    require 'cs_fields.php';
}
function EV_custom_sell_ur_car_html2(){
    require 'cs_fields_soul.php';
}
function EV_custom_sell_ur_car_html3(){
    require 'cs_fields_straps.php';
}
function EV_custom_fields_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    if (isset( $_POST['cs_soul'] )) {
        foreach ($_POST['cs_soul']['color'] as $key => $value) {
            $soul['cs_soul'][] =  $_POST['cs_soul']['color'][$key].','.$_POST['cs_soul']['color_code'][$key].','.$_POST['cs_soul']['bg_img'][$key].','.$_POST['cs_soul']['amount'][$key];
        }
        $soul['soul_setup_charges'] = $_POST['cs_soul']['setupcharges'];
        $cs_soul = json_encode($soul);
        update_post_meta( $post_id, 'cs_soul', $cs_soul);
    }
    if (isset( $_POST['cs_strap'] )) {
        foreach ($_POST['cs_strap']['color'] as $key => $value) {
            $strap['cs_strap'][] =  $_POST['cs_strap']['color'][$key].','.$_POST['cs_strap']['color_code'][$key].','.$_POST['cs_strap']['bg_img'][$key].','.$_POST['cs_strap']['amount'][$key];
        }
        $strap['strap_setup_charges'] = $_POST['cs_strap']['setupcharges'];
        $strap = json_encode($strap);
        update_post_meta( $post_id, 'cs_straps', $strap);
    }
    if (isset( $_POST['pairs'] )) {
        foreach ($_POST['pairs'] as $key => $value) {
            $data['cs_pairs'][] =  $_POST['pairs'][$key].','.$_POST['price'][$key];
        }
        $data = json_encode($data);
        update_post_meta( $post_id, 'cs_pairs', $data);
    }
}
add_action( 'save_post', 'EV_custom_fields_save' );