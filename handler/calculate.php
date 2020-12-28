<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function hitung($query, $userId){
	
	if ($query == null){
		$result = new TextMessageBuilder("MathJS Calculator\n\nCara Pakai:\n/Hitung (query)\n\nExample:\n/Hitung (3+2)*(2-3) atau 3+1");
	} else {
		
		$query = urlencode($query);
		$result = file_get_contents('http://api.mathjs.org/v4/?expr=' . $query);
		$result = new TextMessageBuilder($result);
		
	}
	
	return $result;
	
}