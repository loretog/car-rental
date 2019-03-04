<?php

function generate_code() {
	$string = '';
	$random_string_length = 5;
	$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
	$max = strlen($characters) - 1;
	for ($i = 0; $i < $random_string_length; $i++) {
		$string .= $characters[ mt_rand(0, $max) ];
	}
	return $string;
}

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################

function itexmo($number,$message,$apicode) {
	$url = 'https://www.itexmo.com/php_api/api.php';    
	$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
	$param = array(
	  'http' => array(
	    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	    'method'  => 'POST',
	    'content' => http_build_query($itexmo),
	  ),
	);
	$context  = stream_context_create($param);
	return file_get_contents($url, false, $context);
}
//##########################################################################