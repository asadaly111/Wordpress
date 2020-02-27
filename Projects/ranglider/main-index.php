<?php 
/*
Plugin Name: Rang slider 
Description: Description
Plugin URI: http://#
Author: Asad Ali
Author URI: 
Version: 1.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/
/*

    Copyright (C) Year  Author  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('CS_PATH', dirname(__FILE__));
$plugin = plugin_basename(__FILE__);
define('CS_URL', plugin_dir_url($plugin));


function custom_rang_slider( $atts ) {
	$atts = shortcode_atts( array(
		'default' => 'values'
	), $atts );

	$content 	 = '';

	wp_enqueue_style( 'step', CS_URL . '/slider/bootstrap-slider.min.css' );
	wp_enqueue_style( 'step2', CS_URL . '/slider/css/style.css' );
	wp_enqueue_script( 'range-sldier', CS_URL . '/slider/bootstrap-slider.js', array(), '1.0.0', true );
	wp_enqueue_script( 'range-sldier-custom', CS_URL . '/slider/custom.js', array(), '1.0.0', true );

	return $content 	.= '
	<div class="slider-wapper">
	    <div class="col-md-12">
	        <h3>Your Home Price</h3>
	        <div id="howmuch-num2"></div>
	        <input id="ex2" type="text" name="loan_amount">
	        <div class="row">
	        	<div class="col-md-6 first">
	        		<p>$200,000</p>
	        	</div>
	        	<div class="col-md-6 last">
	        		<p>$2,000,000</p>
	        	</div>
	        </div>
	    </div>


	    <div class="col-md-4 wisefee">
	        <h4>
	            W.I.S.E Flat Fee
	            <span>$12,500 + 3% Buy Side</span>
	        </h4>
	    </div>
	    <div class="col-md-4 EquitySaved">
	        <h5>
	            Equity Saved
	            <span>$1</span>
	        </h5>
	    </div>
	    <div class="col-md-4 Traditional">
	        <h4>
	            Traditional 6% Fee
	            <span>$0 + 3% Buy Side</span>
	        </h4>
	    </div>
	</div>
	';
}
add_shortcode( 'custom_rang_slider','custom_rang_slider' );
?>



 