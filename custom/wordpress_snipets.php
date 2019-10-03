<?php
add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
	$current_user = wp_get_current_user();
// print_r($current_user);
// if ( $current_user->roles[1] == "donor" || $current_user->roles[0] == "donor" && $args->theme_location == 'top_nav' && is_user_logged_in()) {
// $items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/profile/').'">My Profile</a></li>';
// }
	if ( $current_user->roles[1] == "blood bank" || $current_user->roles[0] == "blood bank" && $args->theme_location == 'top_nav') {
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/inventory').'">Manage Inventory</a></li>';
	}
	if ( $current_user->roles[1] == "doctor" || $current_user->roles[0] == "doctor" && $args->theme_location == 'top_nav') {
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/blood-request-form/').'">Blood Request Form</a></li>';
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/request-logs/').'">Request log</a></li>';
	}
	if (is_user_logged_in()) {
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/profile/').'">My Profile</a></li>';
		$items .= '<li id="login-logout" class="sign-in menu-item menu-item-type-post_type menu-item-object-page menu-item-login-logout"><a href="'.site_url().'/wp-login.php?action=logout">Logout</a></li>';
	}
	if (!is_user_logged_in()) {
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/login/').'">Login</a></li>';
	}
}