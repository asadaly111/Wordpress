<?php 

add_action('admin_menu', 'wpse149688');
function wpse149688(){
	add_menu_page( 'Booking Service Form', 'Booking Service Form', 'manage_options', 'booking_service_form', 'booking_service_form_function');
		add_submenu_page( 'booking_service_form', 'Coupon For Booking', 'Coupon For Booking', 'edit_theme_options', 'coupon_booking', 'coupon_function');
		add_submenu_page( 'booking_service_form', 'Inquries', 'Inquries', 'manage_options', 'cs_inquries', 'cs_inquries');
}