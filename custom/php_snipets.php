<?php 
// Extract URL
$string = get_post_meta( get_the_ID(), 'cs_image', true);
preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);
$productimg =  $match[0][0];

// Create a DOM object from a string
$html = str_get_html(get_the_content());


//Scraping
$mainPage = 'https://dxboffplan.com/dubai-developments/';
$paginations = file_get_html($mainPage);
$paginations->find('.all-cities li', $key1)->getAttribute("src");
$paginations->find('.all-cities li', $key1)->plaintext;
$paginations->find('.all-cities li', $key1)->html;


// update category
wp_update_term( $key, 'development', ['parent' => 323] );