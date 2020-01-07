<?php
/**
* @package w_a_p_l
* @version 1.0
*/
/*
Plugin Name: Easy Booking
Plugin URI: #
Description: Easy Booking
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

// Paypal Pro
require 'includes/paypal-pro/pay/includes/config.php';

require 'includes/class_wrapper.php';
require 'includes/clas_main.php';
require 'includes/easy_booking_menu.php';
require 'includes/class_ajax.php';



// Custom tmeplate
add_filter( 'page_template', 'wpa3396_page_template' );
function wpa3396_page_template( $page_template ){
    if ( is_page( 'book' ) ) {
        $page_template = Easy_PATH. '/template/booking-main.php';
    }
    return $page_template;
}

function register_my_session(){
    session_start();
}
add_action('init', 'register_my_session');



add_action( 'wp_enqueue_scripts', 'easy_main_scripts');
function easy_main_scripts() {
    wp_enqueue_script('inputmask', Easy_URL . '/assets/vendor/inputmask/dist/jquery.inputmask.js', array(), '1.1.0', 'true' );
    wp_enqueue_script('loadingoverlay', Easy_URL . '/assets/vendor/loadingoverlay.min.js', array(), '1.1.0', 'true' );
    wp_enqueue_script('sweetalert', Easy_URL . '/assets/vendor/sweetalert.min.js', array(), '1.1.0', 'true' );
    wp_enqueue_script('jqueryvalidation', Easy_URL . '/assets/vendor/jquery.validate.min.js', array(), '1.1.0', 'true' );
    wp_enqueue_script('aditionalmethods', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js', array(), '1.1.0', 'true' );
    wp_enqueue_style( 'slick-styles', Easy_URL . '/assets/vendor/slick-styles.css', array());	
    wp_enqueue_script('slick-js', 'https://kenwheeler.github.io/slick/slick/slick.js', array(), '1.1.0', 'true' );
    wp_enqueue_script('slick-my-slick-js', Easy_URL . '/assets/vendor/custom.js', array(), '1.1.0', 'true' );
}


// Styling and scripts
add_action('easy_booking', 'lms_scripts_styles');
function lms_scripts_styles(){
    echo '<link rel="stylesheet" href="'.Easy_URL.'assets/css/bootstrap.css">';
}


/*****************Activation*******************/
register_activation_hook( __FILE__ , 'my_plugin_install');
function my_plugin_install() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'easybooking';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
                `id` int(11) NOT NULL,
                `booking_id` int(11) NOT NULL,
                `transactionid` varchar(100) NOT NULL,
                `formdata` longtext NOT NULL,
                `response` longtext NOT NULL,
                `status` varchar(50) NOT NULL
                ) $charset_collate;
                ALTER TABLE $table_name
                ADD PRIMARY KEY (`id`);
                ALTER TABLE $table_name
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                COMMIT;
                ";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );

        $the_page_title = 'booking';
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

            // Insert the post into the database
            $the_page_id = wp_insert_post( $_p );

        }
        else {
            // the plugin may have been previously active and the page may just be trashed...

            $the_page_id = $the_page->ID;

            //make sure the page is not trashed...
            $the_page->post_status = 'publish';
            $the_page_id = wp_update_post( $the_page );

        }
        delete_option( 'easy_plugin_booking_page' );
        add_option( 'easy_plugin_booking_page', $the_page_id );
    }





    /* Runs on plugin deactivation */
    register_deactivation_hook( __FILE__, 'my_plugin_remove') ;
    function my_plugin_remove() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'easybooking';
        $charset_collate = $wpdb->get_charset_collate();

        $the_page_id = get_option( 'easy_plugin_booking_page' );
        if( $the_page_id ) {
            wp_delete_post( $the_page_id );
        }
        delete_option("easy_plugin_booking_page");

        $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
    }
