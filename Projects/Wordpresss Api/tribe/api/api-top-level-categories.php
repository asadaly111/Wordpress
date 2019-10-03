<?php
require '../wp-load.php';
if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400'); // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS,PUT");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  exit(0);
}
header('Content-Type: application/json');



$taxonomyName = "product_cat";
$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'hide_empty' => false) );



// echo "<pre>";
// print_r($parent_terms);
// die();


if ($parent_terms) {
  $i = 0;
  foreach ($parent_terms as $key) {
    // hide uncategories default category....
    if ($key->term_id != 15) {
      $new[$i]->id = $key->term_id;
      $new[$i]->name = $key->name;
      $new[$i]->slug = $key->slug;
      $new[$i]->description = $key->description;
      $new[$i]->count = $key->count;
      $i++;
    }
  }
}



print json_encode($new);