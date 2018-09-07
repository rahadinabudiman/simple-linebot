<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function hitung($query, $userId){
	
	if ($query == null){
		$result = new TextMessageBuilder("MathJS Calculator\n\nUsage:\n/Hitung (query)\n\nExample:\n/Hitung (3e+2i)*(2e-3i)");
	} else {
		
		$query = urlencode($query);
		$result = file_get_contents('http://api.mathjs.org/v4/?expr=' . $query);
		$result = new TextMessageBuilder($result);
		
	}
	
	return $result;
	
}