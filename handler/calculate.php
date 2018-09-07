<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function calculate($query, $userId){
	
	if ($query == null){
		$result = new TextMessageBuilder("MathJS Calculator\n\nUsage:\n/calculate (query)\n\nExample:\n/calculate (3e+2i)*(2e-3i)");
	} else {
		
		$query = urlencode($query);
		$result = file_get_contents('http://api.mathjs.org/v4/?expr=' . $query);
		$result = new TextMessageBuilder($result);
		
	}
	
	return $result;
	
}