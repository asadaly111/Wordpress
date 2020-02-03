<?php
/**
* @package w_a_p_l
* @version 1.0
*/
/*
Plugin Name: Soa Chat
Plugin URI: #
Description: Soa Chat
Version: 1.0
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: easy_booking
Author URI: #
*/

/*
Copyright (C) Year  Author  Email : charlestsmith888@gmail.com
Woocommerce Advanced plugin layout is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
Woocommerce Advanced plugin layout is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Woocommerce Advanced plugin layout; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


define('Easy_PATH', dirname(__FILE__));
$plugin = plugin_basename(__FILE__);
define('Easy_URL', plugin_dir_url($plugin));

require 'includes/class_main.php';
require 'includes/easy_booking_menu.php';
require 'includes/class_ajax.php';
require 'includes/Soachat.php';
require 'includes/custom_chat_action.php';




// Custom tmeplate
add_filter( 'page_template', 'wpa3396_page_template' );
function wpa3396_page_template( $page_template ){
    if ( is_page( 'global-chat' ) ) {
        $page_template = Easy_PATH. '/template/booking-main.php';
    }
    return $page_template;
}


// Styling and scripts
add_action('easy_booking', 'lms_scripts_styles');
function lms_scripts_styles(){
    echo '<link rel="stylesheet" href="'.Easy_URL.'assets/css/bootstrap.css">';
}