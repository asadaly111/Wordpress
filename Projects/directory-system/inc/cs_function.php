<?php 


function get_user_email_by_id($id=''){
	$user_info = get_userdata($id);
	return $user_info->data->user_email;
}

function getRows($table,$conditions = array()){
	global $wpdb;
	$sql = 'SELECT ';
	$sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
	$sql .= ' FROM '.$table;
	if(array_key_exists("condition_before",$conditions)){
		$sql .= ' '.$conditions['condition_before'];
	}		
	if(array_key_exists("where",$conditions)){
		$sql .= ' WHERE ';
		$i = 0;
		foreach($conditions['where'] as $key => $value){
			$pre = ($i > 0)?' AND ':'';
			$sql .= $pre.'`'.$key.'`'." = '".$value."'";
			$i++;
		}
	}
	if(array_key_exists("condition",$conditions)){
		$sql .= ' '.$conditions['condition'];
	}
	if(array_key_exists("order_by",$conditions)){
		$sql .= ' ORDER BY '.$conditions['order_by'];
	}
	if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
	}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['limit'];
	}
	if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
		switch($conditions['return_type']){
			case 'count':
			return 'change your code';
			break;
			case 'single':
			return	$wpdb->get_row($sql);
			break;
			default:
			$data = '';
		}
	}else{
		return $wpdb->get_results($sql);
	}
}


add_filter('woocommerce_save_account_details_required_fields', 'wc_save_account_details_required_fields' );
function wc_save_account_details_required_fields( $required_fields ){
    unset( $required_fields['account_display_name'] , $required_fields['account_first_name'] , $required_fields['account_last_name'] );
    return $required_fields;
}


// Messages Tab
add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link_1___1', 40 );
function misha_log_history_link_1___1( $menu_links ){
// Remove the logout menu item.
	$logout = $menu_links['customer-logout'];
	$edit = $menu_links['edit-account'];
	unset( $menu_links['customer-logout'], $menu_links['edit-account'] );

	$menu_links = array_slice( $menu_links, 0, 5, true )
	+ array( 'entries' => 'Business Listing' )
	+ array_slice( $menu_links, 5, NULL, true );
	$menu_links['edit-account'] = $edit;
	$menu_links['customer-logout'] = $logout;
	return $menu_links;
}
add_action( 'init', '_messages_endpoint' );
function _messages_endpoint() {
	add_rewrite_endpoint( 'entries', EP_PAGES );
}
add_action( 'woocommerce_account_entries_endpoint', 'misha_my_account_endpoint_content_1_1_1' );
function misha_my_account_endpoint_content_1_1_1() {
	require 'entries.php';
}


// ************* STUDENT
add_action( 'wp_ajax_cms_checkusername', 'cms_checkusername' );
add_action( 'wp_ajax_nopriv_cms_checkusername', 'cms_checkusername' );
function cms_checkusername(){
	if (username_exists($_POST['userName'])) {
		echo 'false';
	}else{
		echo 'true';
	}
	exit();
}
add_action( 'wp_ajax_cms_checkemail', 'cms_checkemail' );
add_action( 'wp_ajax_nopriv_cms_checkemail', 'cms_checkemail' );
function cms_checkemail(){
	if (email_exists($_POST['userEmail'])) {
		echo 'false';
	}else{
		echo 'true';
	}
	exit();
}

// For user end only
add_action( 'wp_ajax_cms_deleteattachment', 'cms_deleteattachment' );
add_action( 'wp_ajax_nopriv_cms_deleteattachment', 'cms_deleteattachment' );
function cms_deleteattachment(){
	global $wpdb;
	$wpdb->update( $wpdb->prefix.'post_images', ['isDelete' => 1], ['id' => $_POST['id'] ]);
	exit();
}

// admin delete images
add_action( 'wp_ajax_cms_deleteattachment_admin', 'cms_deleteattachment_admin' );
add_action( 'wp_ajax_nopriv_cms_deleteattachment_admin', 'cms_deleteattachment_admin' );
function cms_deleteattachment_admin(){
	global $wpdb;
	$wpdb->update( $wpdb->prefix.'post_images', ['adminDeleteApprove' => 1], ['id' => $_POST['id'] ]);
	exit();
}





add_action( 'wp_ajax_cms_formsubmit', 'cms_formsubmit' );
add_action( 'wp_ajax_nopriv_cms_formsubmit', 'cms_formsubmit' );
function cms_formsubmit(){
	

	global $wpdb;
	$userdata = array(
		'user_login'  =>  $_POST['userName'],
		'user_email' => $_POST['userEmail'],
		'user_pass'   => $_POST['password'],
	);
	$user_id = wp_insert_user( $userdata );

	$post_data = array(
		'post_author' => $user_id,
		'post_title' => $_POST['company_name'],
		'post_status' => 'pending',
		'post_content' => $_POST['company_description'],
		'post_type' => 'directories',
	);
	
	$post_id = wp_insert_post( $post_data );



	
	if (isset($_FILES['logo'])) {
		$attach_id = insert_attachment('logo', $post_id);
		update_post_meta( $post_id, '_thumbnail_id', $attach_id);
	}
	
	
	if (isset($_FILES['catalogue'])) {
		$catalogue = insert_attachment('catalogue', $post_id);
		add_post_meta( $post_id, 'catalogue', $catalogue , false);

	}



	if (isset($_FILES['project_photos'])) {
		$files = $_FILES["project_photos"];
		foreach ($files['name'] as $key => $value) {
			if ($files['name'][$key]) {
				$file = array(
					'name' => $files['name'][$key],
					'type' => $files['type'][$key],
					'tmp_name' => $files['tmp_name'][$key],
					'error' => $files['error'][$key],
					'size' => $files['size'][$key]
				);
				$_FILES = array ("my_file_upload" => $file);
				foreach ($_FILES as $file => $array) {
					$newupload[] = insert_attachment($file, $post_id);
				}
			}
		}
		global $wpdb;
		foreach ($newupload as $key => $value) {
			$images = array(
				'post_id' => $post_id,
				'image' => $value,
			);
			$wpdb->insert($wpdb->prefix.'post_images', $images);
		}
	}

	
	


	
	$subcat = implode(',', $_POST['subcats']);
	add_post_meta( $post_id,'econdir_company_name', $_POST['company_name'], false);
	add_post_meta( $post_id,'econdir_company_phone', $_POST['company_phone'], false);
	add_post_meta( $post_id,'econdir_contact_person_name', $_POST['contact_person_name'], false);
	add_post_meta( $post_id,'econdir_category', $_POST['category'], false);
	add_post_meta( $post_id,'econdir_city', $_POST['city'], false);
	add_post_meta( $post_id,'econdir_city', $_POST['location'], false);
	add_post_meta( $post_id,'econdir_subcats', $subcat, false);
	add_post_meta( $post_id,'econdir_website', $_POST['website'], false);
	add_post_meta( $post_id,'company_email', $_POST['userEmail'], false);
	add_post_meta( $post_id,'company_location', $_POST['location'], false);



$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	wp_mail( get_user_email_by_id($user_id),'ECONDIR | Thank you for Signing Up', '<table style="width: 610px; background-color: #fff; display: table; margin: auto;">
	<tbody>
        <tr>
        <td>
            <table style="width: 563px; display: table; margin: 20px auto 0; background-color: #2a2a2a;">
                <tbody>
                    <tr>
                    <td style="width: 50%;  padding: 10px 0 10px 10px;"><a href="index.html"><img style="display: table; margin: 50px auto 50px;" src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/logo.png"></a></td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 563px; display: table; margin: auto; background-color: #f2f2f2;">
                <tbody>
                    <tr>
                    <td style="padding: 70px 0px 70px 0;">
                    
                        <p style="font-size: 16px; color: #4d4d4d; font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif; text-align: center; padding: 0 50px 0 50px; margin: 0 0 0 0; line-height: 30px;">Dear User,<br>


                          Thank you for submitting your profile with us, your submission is currently under review and our team will get back to you shortly.
<br>
<br>

Have a great day!<br>
<br>
<br>
 </p>
                    </td>
                    </tr>
                </tbody>
            </table>
	   <table style="width: 563px; display: table; margin: auto;">
                <tbody>
                    <tr style="height: 21.5454px;">
                    <td style="padding: 30px 0px 30px 0px; text-align: center;">
                        <a href="" style="font-size: 25px;color: #135688; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/insta-icon.png"></a>

            	       <a href="" style="font-size: 25px;color: #3f5b98; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/fb-icon.png"></a>

            	       <a href="" style="font-size: 25px;color: #0873b2; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/linkedin-icon.png"></a>

                       <a href="" style="font-size: 25px;color: #22a0f2;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/twitter-icon.png"></a>
                       
                    </td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 563px; display: table; margin: 0 auto 20px; background-color: #ff6712;">
                <tbody>
                    <tr>
                    <td>
                        <h3 style="font-size: 12px; font-weight:lighter; font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif, sans-serif; color: #fff; text-align: center;">Copyrights 2018, Econdir - All rights reserved.</h3>
                    </td>
                    </tr>
                </tbody>
            </table>

        </td>
        </tr>
    </tbody>
</table>', $headers);

	$msg = array(
		'msg' 	=> 'Your account has been created! Kindly login to see your directory status <a href="'.site_url('/login/').'" style="font-size: 13px;">Login</a>',
		'class' => 'alert-success',
	);
	print(json_encode($msg));
	exit();
}

add_action( 'wp_ajax_cms_formsubmit_1', 'cms_formsubmit_1' );
add_action( 'wp_ajax_nopriv_cms_formsubmit_1', 'cms_formsubmit_1' );
function cms_formsubmit_1(){
	global $wpdb;
	$postdata = json_encode($_POST);
	
	update_post_meta( $_POST['post_id'],'directory_updated_request', $postdata);
	$message = '
	Request for update...<br>
	Directory Name : '.get_the_title($_POST['post_id']).'<br>
	<a href="'.get_permalink($_POST['post_id']).'">Update</a>
	';


	if (isset($_FILES['logo'])) {
		$attach_id = insert_attachment('logo', $_POST['post_id']);
		update_post_meta( $_POST['post_id'], '_thumbnail_id', $attach_id);
	}


	if (isset($_FILES['catalogue'])) {
		$catalogue = insert_attachment('catalogue', $_POST['post_id']);
		update_post_meta($_POST['post_id'], 'catalogue', $catalogue);
	}





$header = "MIME-Version: 1.0" . "\r\n";
$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	wp_mail( get_option('admin_email'), 'ECONDIR | Profile Update Request','<table style="width: 610px; background-color: #fff; display: table; margin: auto;">
	<tbody>
        <tr>
        <td>
            <table style="width: 563px; display: table; margin: 20px auto 0; background-color: #2a2a2a;">
                <tbody>
                    <tr>
                    <td style="width: 50%;  padding: 10px 0 10px 10px;"><a href="index.html"><img style="display: table; margin: 50px auto 50px;" src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/logo.png"></a></td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 563px; display: table; margin: auto; background-color: #f2f2f2;">
                <tbody>
                    <tr>
                    <td style="padding: 70px 0px 70px 0;">
                        <h2 style=" font-size: 20px; color: #4d4d4d; font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;  margin: 0px 0 30px 0; text-align: center; font-weight:600;">Request for update</h2>
                        <p style="font-size: 16px; color: #4d4d4d; font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif; text-align: center; padding: 0 50px 0 50px; margin: 0 0 0 0; line-height: 30px;">
						
						   '.$message.'</p>
                    </td>
                    </tr>
                </tbody>
            </table>
	   <table style="width: 563px; display: table; margin: auto;">
                <tbody>
                    <tr style="height: 21.5454px;">
                    <td style="padding: 30px 0px 30px 0px; text-align: center;">
                        <a href="" style="font-size: 25px;color: #135688; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/insta-icon.png"></a>

            	       <a href="" style="font-size: 25px;color: #3f5b98; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/fb-icon.png"></a>

            	       <a href="" style="font-size: 25px;color: #0873b2; margin: 0px 10px 0px 0px;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/linkedin-icon.png"></a>

                       <a href="" style="font-size: 25px;color: #22a0f2;"><img src="http://dev17.onlinetestingserver.com/hn/econdir-wp/wp-content/themes/econ-dir/images/twitter-icon.png"></a>
                       
                    </td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 563px; display: table; margin: 0 auto 20px; background-color: #ff6712;">
                <tbody>
                    <tr>
                    <td>
                        <h3 style="font-size: 12px; font-weight:lighter; font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif, sans-serif; color: #fff; text-align: center;">Copyrights 2018, Econdir - All rights reserved.</h3>
                    </td>
                    </tr>
                </tbody>
            </table>

        </td>
        </tr>
    </tbody>
</table>' , $header);
	$msg = array(
		'msg' 	=> 'Your request has been submited for review!',
		'class' => 'alert-success',
	);
	print(json_encode($msg));
	exit();
}

// gallery Update
add_action( 'wp_ajax_cs_update_gallery', 'cs_update_gallery' );
add_action( 'wp_ajax_nopriv_cs_update_gallery', 'cs_update_gallery' );
function cs_update_gallery(){    
	$attach_id = insert_attachment('file', $_GET['id']);
	global $wpdb;
	$images = array(
		'post_id' => $_GET['id'], 
		'image' => $attach_id, 
	);
	$wpdb->insert($wpdb->prefix.'post_images', $images);



	exit();
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



// directories

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function cs_directories() {

	$labels = array(
		'name'               => __( 'Directories', 'text-domain' ),
		'singular_name'      => __( 'Directory', 'text-domain' ),
		'add_new'            => _x( 'Add New Directory', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Directory', 'text-domain' ),
		'edit_item'          => __( 'Edit Directory', 'text-domain' ),
		'new_item'           => __( 'New Directory', 'text-domain' ),
		'view_item'          => __( 'View Directory', 'text-domain' ),
		'search_items'       => __( 'Search Directories', 'text-domain' ),
		'not_found'          => __( 'No Directories found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Directories found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Directory:', 'text-domain' ),
		'menu_name'          => __( 'Directories', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
		),
	);

	register_post_type( 'directories', $args );
}

add_action( 'init', 'cs_directories' );

// 
require 'cs_fields.php';