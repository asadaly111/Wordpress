<?php 
function Payments_function(){require 'backend/cs_payments.php';}
function Subscription_function(){require 'backend/cs_subscriptions.php';}


add_action( 'admin_menu', 'new_page_for_services_camps');
function new_page_for_services_camps(){
		add_menu_page( 'Payments', 'Payments', 'manage_options', 'Payments', 'Payments_function');
		add_submenu_page( 'Payments', 'Subscription', 'Subscription' , 'edit_theme_options', 'Subscription', 'Subscription_function');
}

// Styling and scripts
add_action('lms_scripts', 'lms_scripts_styles');
function lms_scripts_styles(){
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/bootstrap.css">';
}
