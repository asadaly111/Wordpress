<?php 
function easy_boooking_menu(){
	require Easy_PATH.'/template/booking_inquiries.php';
}
add_action('admin_menu', 'wpse149688');
function wpse149688(){
	add_menu_page( 'Booking Inquiries', 'Booking Inquiries', 'read', 'easy_boooking_menu', 'easy_boooking_menu');
	// add_submenu_page( 'easy_boooking_menu', 'Import Products', 'Import Products', 'read', 'pb_donwload_list', 'pb_donwload_list');
}

