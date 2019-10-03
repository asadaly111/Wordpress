<?php
/**
* Main Function
*/
class c3_dbmanager {
/*
* Returns rows from the database based on the conditions
* @param string name of the table
* @param array select, where, order_by, limit and return_type conditions
*/
public function getRows($table,$conditions = array()){
	global $wpdb;
	$sql = 'SELECT ';
	$sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
	$sql .= ' FROM '.$table;
	if(array_key_exists("condition_before",$conditions)){
		$sql .= ' '.$conditions['condition_before'];
	}		
	if(array_key_exists("where",$conditions)){
		$sql .= ' WHERE ';
		$i = 0;
		foreach($conditions['where'] as $key => $value){
			$pre = ($i > 0)?' AND ':'';
			$sql .= $pre.'`'.$key.'`'." = '".$value."'";
			$i++;
		}
	}
	if(array_key_exists("condition",$conditions)){
		$sql .= ' '.$conditions['condition'];
	}
	if(array_key_exists("order_by",$conditions)){
		$sql .= ' ORDER BY '.$conditions['order_by'];
	}
	if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
	}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['limit'];
	}
	if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
		switch($conditions['return_type']){
			case 'count':
			return 'change your code';
			break;
			case 'single':
			return	$wpdb->get_row($sql);
			break;
			default:
			$data = '';
		}
	}else{
		return $wpdb->get_results($sql);
	}
}
public function getCol($table , $conditions){
	global $wpdb;
	$sql = 'SELECT '.'`'.implode('`,`', $conditions['col']).'`';
	$sql .= ' FROM `'.$table.'` ';
	if(array_key_exists("where",$conditions)){
		$sql .= ' WHERE ';
		$i = 0;
		foreach($conditions['where'] as $key => $value){
			$pre = ($i > 0)?' AND ':'';
			$sql .= $pre.'`'.$key.'`'." = '".$value."'";
			$i++;
		}
	}
	if(array_key_exists("condition",$conditions)){
		$sql .= ' '.$conditions['condition'];
	}
	if(array_key_exists("order_by",$conditions)){
		$sql .= ' ORDER BY '.$conditions['order_by'];
	}
	if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
	}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['limit'];
	}
	if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
		switch($conditions['return_type']){
			case 'single':
			return	$wpdb->get_row($sql);
			break;
			default:
			$data = '';
		}
	}else{
		return $wpdb->get_results($sql);
	}
}
// $wpdb->insert( $table, $data, $format );
// $wpdb->update( $table, $data, $where, $format = null, $where_format = null );
// $wpdb->delete( 'table', array( 'ID' => 1 ) );
// $lastid = $wpdb->insert_id;
public function get_user_name($id){
	$studentname = get_user_by( 'ID', $id);
	return $studentname->data->display_name;
}
public function get_user_email_by_id($id=''){
	$user_info = get_userdata($id);
	return $user_info->data->user_email;
}
}
$obj = new c3_dbmanager();
function pr($data = array())
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
function get_date($date){
  $oDate = new DateTime($date);
  return $sDate = $oDate->format("d, F y");
}
function get_mesg_date($date){
	//11:01 AM    |    June 9
  $oDate = new DateTime($date);
  return $sDate = $oDate->format("h:i:sa | F d");
}

function get_user_name_letter($userid){
	$studentname = get_user_by( 'ID', $userid);
	return substr($studentname->data->display_name, 0 , 1);
}
function get_user_name($userid){
	$studentname = get_user_by( 'ID', $userid);
	return $studentname->data->display_name;
}
function feature_img($id=''){
	$post_thumbnail_id = get_post_thumbnail_id($id); 
	$thumbnail = wp_get_attachment_image_src($post_thumbnail_id ,'thumbnail', false); 
	if (empty($thumbnail)) {
		$src = get_stylesheet_directory_uri().'/black/images/profile-img.png';
	}else{
		$src = $thumbnail[0];
	}
	return $src;
}

function get_the_unready_message_count($userid=0, $postid=0){
	global $obj, $wpdb;
	$count = $obj->getRows($wpdb->prefix.'messages', ['where' =>['sender_id' =>$userid, 'post_id' => $postid , 'status' => 'unseen' ] ]);
	if ($count) {
		return count($count);
	}else{
		return 0;
	}
}

if (!function_exists('insert_attachment')) {
	function insert_attachment($file_handler, $post_id, $setthumb=false) {

		if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) {
			return __return_false();
		}
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
		$attach_id = media_handle_upload( $file_handler, $post_id );
		
		

		return $attach_id;
	}
}

// get options custom
if (!function_exists('cs_get_option')) {
	function cs_get_option($key='') {
		if ($key == '') {
			return;
		}
		$woo_settings = array(
			// 'text-count' => 75,
			// 'productcolm' => 'col-md-6',
			// 'popupbtn' => '[...]',
			// 'woo-popup' => 'red',
			'googleapi' => 'AIzaSyDDJS7wVeKbFe74xYOd4dd0MrfyMEFjo6A',
			'columncontent' => '
					<div class="col-md-3 style1">
						<div class="propertythumb"><a href="{$link}"><img src="{$img}" alt=""></a></div>
						<div class="properties_info">
							<h2>{$title}</h2>
							<p>{$address}</p>
							<h3>${$price}</h3>
							<a href="{$link}">Read More</a>
						</div>
					</div>	
			'
			);
		if ( get_option($key) != '' ) {
			return get_option($key);
		} else {
			return $woo_settings[$key];
		}
	}
}
