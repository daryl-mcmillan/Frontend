<?php

function send_json($obj) {
	$encoded = json_encode($obj);
	header('Content-Type: application/json');
	echo $encoded;
}

function get_json($url) {
	$options = array('http' => array('user_agent'=>'frontend gateway'));
	$context = stream_context_create($options);
	$contents = file_get_contents($url, false, $context);
	if( $contents === false ) {
		throw new Exception("failed fetching url $url");
	}
	$data = json_decode($contents);
	if( is_null($data) ) {
		throw new Exception("failed parsing json from url $url");
	}
	return $data;
}

?>
