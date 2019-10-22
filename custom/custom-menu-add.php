<?php

add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
	$current_user = wp_get_current_user();
	// print_r($current_user);

	// if ( $current_user->roles[1] == "donor" || $current_user->roles[0] == "donor" && $args->theme_location == 'top_nav' && is_user_logged_in()) {
	// 	$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/profile/').'">My Profile</a></li>';
	// }

	if ( $current_user->roles[1] == "blood bank" || $current_user->roles[0] == "blood bank" && $args->theme_location == 'top_nav') {
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/inventory').'">Manage Inventory</a></li>';
	}

	if ( $current_user->roles[1] == "doctor" || $current_user->roles[0] == "doctor" && $args->theme_location == 'top_nav') {
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/blood-request-form/').'">Blood Request Form</a></li>';
				$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/request-logs/').'">Request log</a></li>';
	}
		if ( $current_user->roles[1] == "hospital" || $current_user->roles[0] == "hospital" && $args->theme_location == 'top_nav') {
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/blood-request-form/').'">Blood Request Form</a></li>';
				$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/request-logs/').'">Request log</a></li>';
	}

	if (is_user_logged_in()) {
	$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/profile/').'">My Profile</a></li>';
	$items .= '<li id="login-logout" class="sign-in menu-item menu-item-type-post_type menu-item-object-page menu-item-login-logout"><a href="'.wp_logout_url(home_url()).'">Logout</a></li>';
	}

	if (!is_user_logged_in()) {
		$items .= '<li id="my-profile-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="'.site_url('/login/').'">Login</a></li>';	
	}
	// if ( is_user_logged_in() && $args->theme_location == 'top_nav') {
	// 	$items .= '<li id="login-logout" class="sign-in menu-item menu-item-type-post_type menu-item-object-page menu-item-login-logout"><a href="http://tratali.com/wp-login.php?action=logout">Logout</a></li>';
	// }
	// else if (!is_user_logged_in() && $args->theme_location == 'top_nav') {
	// 	$items .= '<li id="login-logout" class="sign-in menu-item menu-item-type-post_type menu-item-object-page menu-item-login-logout">
	// 	<a href="'.site_url('sign-in').'"> Sign In</a></li>';
	// }



	$items .= '
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-253 item-level-0 menu-item-design-default menu-simple-dropdown item-event-hover">
	<a href="#" class="woodmart-nav-link"><span class="nav-link-text">Dashboard</span></a>
	<div class="sub-menu-dropdown color-scheme-dark">
		<div class="container">
			<ul class="sub-menu color-scheme-dark">
				<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38 item-level-1"><a href="http://localhost:8080/flightcrewtestlink/about-us/" class="woodmart-nav-link"><span class="nav-link-text">About Us</span></a></li>
				<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38 item-level-1"><a href="http://localhost:8080/flightcrewtestlink/about-us/" class="woodmart-nav-link"><span class="nav-link-text">About Us</span></a></li>
				<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38 item-level-1"><a href="http://localhost:8080/flightcrewtestlink/about-us/" class="woodmart-nav-link"><span class="nav-link-text">About Us</span></a></li>
				<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38 item-level-1"><a href="http://localhost:8080/flightcrewtestlink/about-us/" class="woodmart-nav-link"><span class="nav-link-text">About Us</span></a></li>
			</ul>
		</div>
	</div>
</li>
	';

	return $items;
}

?>


