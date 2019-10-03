<?php 
// Current ID 
$user_id  = get_current_user_id();

// ajax
require 'admin/cs_ajax_request.php';

// Posttype Page
require 'admin/cs_posttype.php';

// cs_users.php
require 'admin/cs_users.php';

// main class
require 'class/main_class.php';
// class individual
require 'class/class_individual.php';
// class agency
require 'class/class_agency.php';
// class common
require 'class/black_common.php';




add_role( 'agency', 'agency',  array('read' => true, 'edit_posts' => true ) ); 
add_role( 'individual', 'individual',  array('read' => true, 'edit_posts' => true ) ); 



?>