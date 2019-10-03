<?php 
$user = wp_get_current_user();

function wooc_extra_register_fields() {?>
       <p class="form-row form-row-first">
              <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
              <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
       </p>
       <p class="form-row form-row-last">
              <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
              <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
       </p>
<!-- <p class="form-row form-row-wide">
       <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
       <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
</p> -->
<div class="clear"></div>
<?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );


if ( in_array( 'individual', (array) $user->roles ) ) {
       // Edit profile tab
       add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
       function misha_log_history_link( $menu_links ){
              $menu_links = array_slice( $menu_links, 0, 5, true )
              + array( 'edit-profile' => 'Edit Profile' )
              + array_slice( $menu_links, 5, NULL, true );
              return $menu_links;
       }
       // Messages Tab
      add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link_1___1', 40 );
       function misha_log_history_link_1___1( $menu_links ){
              $menu_links = array_slice( $menu_links, 0, 5, true )
              + array( 'messages' => 'Messages' )
              + array_slice( $menu_links, 5, NULL, true );
              return $menu_links;
       }

}
if (in_array( 'agency', (array) $user->roles )) {
       // Messages Tab
      add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link_1___1', 40 );
       function misha_log_history_link_1___1( $menu_links ){
              $menu_links = array_slice( $menu_links, 0, 5, true )
              + array( 'messages' => 'Messages' )
              + array_slice( $menu_links, 5, NULL, true );
              return $menu_links;
       }       
       add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
       function misha_log_history_link( $menu_links ){
              $menu_links = array_slice( $menu_links, 0, 5, true )
              + array( 'edit-profile' => 'Edit Profile' )
              + array_slice( $menu_links, 5, NULL, true );
              return $menu_links;
       }       
       add_filter ( 'woocommerce_account_menu_items', '_black_add_new_services', 40 );
       function _black_add_new_services( $menu_links ){
              $menu_links = array_slice( $menu_links, 0, 5, true )
              + array( 'add_new_service' => 'Add New Profile' )
              + array_slice( $menu_links, 5, NULL, true );
              return $menu_links;
       }
}



/*
* Step 2. Register Permalink Endpoint
*/
add_action( 'init', 'misha_add_endpoint' );
function misha_add_endpoint() {
// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
       add_rewrite_endpoint( 'edit-profile', EP_PAGES );
}
/*
* Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
*/
add_action( 'woocommerce_account_edit-profile_endpoint', 'misha_my_account_endpoint_content' );
function misha_my_account_endpoint_content() {
       require_once 'pages/black_edit_profile.php';
}





/*
* Step 1. Add Link to My Account menu
*/
add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link_1', 40 );
function misha_log_history_link_1( $menu_links ){
       $menu_links = array_slice( $menu_links, 0, 5, true )
       + array( 'transactions' => 'Transactions' )
       + array_slice( $menu_links, 5, NULL, true );
       return $menu_links;
}


/*
* Step 2. Register Permalink Endpoint
*/
add_action( 'init', 'misha_add_endpoint_1' );
function misha_add_endpoint_1() {
// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
       add_rewrite_endpoint( 'transactions', EP_PAGES );
}
/*
* Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
*/
add_action( 'woocommerce_account_transactions_endpoint', 'misha_my_account_endpoint_content_1' );
function misha_my_account_endpoint_content_1() {
       require_once 'pages/black_transactions.php';
}






/*
* Step 2. Register Permalink Endpoint
*/
add_action( 'init', '_black_add_new_services_endpoint' );
function _black_add_new_services_endpoint() {
// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
       add_rewrite_endpoint( 'add_new_service', EP_PAGES );
}
/*
* Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
*/
add_action( 'woocommerce_account_add_new_service_endpoint', 'misha_my_account_endpoint_content_1_1' );
function misha_my_account_endpoint_content_1_1() {
       require_once 'pages/black_add_new_service.php';
}


/*
* Message tab
*/
add_action( 'init', '_messages_endpoint' );
function _messages_endpoint() {
       add_rewrite_endpoint( 'messages', EP_PAGES );
}
add_action( 'woocommerce_account_messages_endpoint', 'misha_my_account_endpoint_content_1_1_1' );
function misha_my_account_endpoint_content_1_1_1() {
       require_once 'pages/black_individual_messages.php';
}



if (!function_exists('insert_attachment')) {
       function insert_attachment($file_handler, $post_id, $setthumb=false) {
              if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) {
                     return __return_false();
              }
              require_once(ABSPATH . "wp-admin" . '/includes/image.php');
              require_once(ABSPATH . "wp-admin" . '/includes/file.php');
              require_once(ABSPATH . "wp-admin" . '/includes/media.php');
              $attach_id = media_handle_upload( $file_handler, $post_id );
              return $attach_id;
       }
}


/**
 * Change the placeholder image
 */
add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

function custom_woocommerce_placeholder_img_src( $src ) {
       $upload_dir = wp_upload_dir();
       $uploads = untrailingslashit( $upload_dir['baseurl'] );
       // replace with path to your image
       $src = $uploads . '/2012/07/thumb1.jpg';
       return $src;
}


 ?>