<?php 

function CHI_main_menu(){echo "string";}
function CHI_donwload_list(){require CHI_PATH.'/templates/download_list.php';}

add_action('admin_menu', 'wpse149688');
function wpse149688(){
	add_menu_page( 'China Brand Importer', 'China Brand Importer', 'read', 'CHI_main_menu', 'CHI_main_menu');
	add_submenu_page( 'CHI_main_menu', 'Import Download Listing Products', 'Import Download Listing Products', 'read', 'CHI_donwload_list', 'CHI_donwload_list');
}

// Styling and scripts
add_action('lms_scripts', 'lms_scripts_styles');
function lms_scripts_styles(){
	echo '<link rel="stylesheet" href="'.CHI_URL.'assets/css/bootstrap.css">';
}



function remove_admin_bar_links() {
	global $wp_admin_bar, $current_user;
	if ($current_user->ID != 1) {
		$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
		$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
		$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
		$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
		$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
		$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
		// $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
		// $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
		$wp_admin_bar->remove_menu('updates');          // Remove the updates link
		$wp_admin_bar->remove_menu('comments');         // Remove the comments link
		$wp_admin_bar->remove_menu('new-content');      // Remove the content link
		$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
	}
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
// change wp logo in login image
function my_login_logo() { ?>
    <style type="text/css">
    div#wpfooter {
    	display: none !important;
    }
    /*#login h1 a, .login h1 a {
    	background-image: url('<?php //echo get_stylesheet_directory_uri(); ?>/images/logo.png');
    	height: 65px;
    	width: 320px;
    	background-size: 320px 65px;
    	background-repeat: no-repeat;
    	padding-bottom: 0;
    }*/
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
    return '86 Huaren Backend';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
// Remove toolbar from every user
add_filter('show_admin_bar', '__return_false');
