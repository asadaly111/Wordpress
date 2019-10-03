<?php
function _GET($label='',$default='',$set_default=false){
	$value=$default;
	if(isset($_GET[$label])&&!empty($_GET[$label])){
		$value=$_GET[$label];
	}
	if($set_default===true&&(!isset($_GET[$label])||$_GET[$label]=='')){
		$_GET[$label]=$default;
	}
	return $value;
}
function _POST($label='',$default='',$set_default=false){
	$value=$default;
	if(isset($_POST[$label])&&!empty($_POST[$label])){
		$value=$_POST[$label];
	}
	if($set_default===true&&(!isset($_POST[$label])||$_POST[$label]=='')){
		$_POST[$label]=$default;
	}
	return $value;
}
function _SESSION($label='',$default='',$set_default=false){
	$value=$default;
	if(isset($_SESSION[$label])&&!empty($_SESSION[$label])){
		$value=$_SESSION[$label];
	}
	if($set_default===true&&(!isset($_SESSION[$label])||$_SESSION[$label]=='')){
		$_SESSION[$label]=$default;
	}
	return $value;
}

add_action('init', 'start_session', 1);
function start_session() {
	if(!session_id()) {
		session_start();
	}
}

function pr($arrayName = array()){
	echo "<pre>";
	print_r($arrayName);
	echo "</pre>";
}