<?php 
// 1st step 
function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header'); ?>



// 2nd option .htaccess
 <IfModule mod_headers.c>
   Header set Access-Control-Allow-Origin "*"
 </IfModule>



