<?php
// //start session in all pages
// if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
//if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above
// sandbox or live

define('PPL_MODE', 'live');

if(PPL_MODE=='sandbox'){
	define('PPL_API_USER', 'charlestsmith888_api1.gmail.com');
	define('PPL_API_PASSWORD', 'K2UGS3T5NGF96R29');
	define('PPL_API_SIGNATURE', 'ANRt4SJMHl0-agAfjMKhlBwA4q.bAF7b2D6b74Jy-Nc72yeDgZmZadsC');
}else{
	define('PPL_API_USER', 'jo_forman_api1.yahoo.co.uk');
	define('PPL_API_PASSWORD', 'G56ATMBLY9DK67AC');
	define('PPL_API_SIGNATURE', 'AAXk.4xTqZKKmyPjxA7u4fiEF3diABRkDIdrB.qcUMRXXbCpqyWRJPw8');
}

define('PPL_LANG', 'EN');
define('PPL_LOGO_IMG', 'http://jos-art.co.uk/wp-content/uploads/2018/06/logo-01-7101-ver-8.png');
define('PPL_RETURN_URL', 'http://jos-art.co.uk/process/');
define('PPL_CANCEL_URL', 'http://jos-art.co.uk/cancel/');
define('PPL_CURRENCY_CODE', 'EUR');