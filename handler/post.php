<?php

function postData($path, $data){
	
	$URL = 'https://wwyetti.firebaseio.com/' . $path . '.json';

	$curl = curl_init();
	curl_setopt( $curl, CURLOPT_URL, $URL );
	curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PUT" );
	curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
	$response = curl_exec( $curl );
	curl_close( $curl );
	
}