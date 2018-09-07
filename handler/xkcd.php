<?php

use \LINE\LINEBot\MessageBuilder\ImageMessageBuilder as ImageMessageBuilder;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function xkcd($query, $userId){
	
	if ($query == null){
		$json = file_get_contents('http://xkcd.com/info.0.json');
		$json = json_decode($json, true);
		
		$query = rand(1, $json['num']);
	}
	
	$json = file_get_contents('http://xkcd.com/' . $query . '/info.0.json');
	$json = json_decode($json, true);
	
	if ( isset($json['img']) )
		$result = new ImageMessageBuilder($json['img'], $json['img']);
	else
		$result = new TextMessageBuilder('xkcd ke-' . $query . ' tidak ada');
	
	return $result;
	
}
