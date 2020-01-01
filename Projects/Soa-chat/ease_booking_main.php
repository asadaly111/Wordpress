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


/*****************Activation*******************/
register_activation_hook( __FILE__ , 'my_plugin_install');
function my_plugin_install() {

        $the_page_title = 'global-chat';
        delete_option("easy_plugin_booking_page");
        add_option("easy_plugin_booking_page", '0', '', 'yes');
        $the_page = get_page_by_title( $the_page_title );
        if ( ! $the_page ) {

            // Create post object
            $_p = array();
            $_p['post_title'] = $the_page_title;
            $_p['post_content'] = "";
            $_p['post_status'] = 'publish';
            $_p['post_type'] = 'page';
            $_p['comment_status'] = 'closed';
            $_p['ping_status'] = 'closed';
            $_p['post_category'] = array(1); // the default 'Uncatrgorised'

            // Insert the post into the database
            $the_page_id = wp_insert_post( $_p );


            $_p = array();
            $_p['post_title'] = 'Thankyou';
            $_p['post_content'] = "Your has been reserved!";
            $_p['post_status'] = 'publish';
            $_p['post_type'] = 'page';
            $_p['comment_status'] = 'closed';
            $_p['ping_status'] = 'closed';
            $_p['post_category'] = array(1); // the default 'Uncatrgorised'

            $the_page_id = wp_insert_post( $_p );
        }
        else {
            $the_page_id = $the_page->ID;
            $the_page->post_status = 'publish';
            $the_page_id = wp_update_post( $the_page );

        }
        delete_option( 'easy_plugin_booking_page' );
        add_option( 'easy_plugin_booking_page', $the_page_id );
    }



    /* Runs on plugin deactivation */
    register_deactivation_hook( __FILE__, 'my_plugin_remove') ;
    function my_plugin_remove() {
        $the_page_id = get_option( 'easy_plugin_booking_page' );
        if( $the_page_id ) {
            wp_delete_post( $the_page_id );
        }
        delete_option("easy_plugin_booking_page");
    }
