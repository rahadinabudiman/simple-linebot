<?php

use \LINE\LINEBot\MessageBuilder\ImageMessageBuilder as ImageMessageBuilder;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function meme($query, $userId){
	
	$URL = 'http://version1.api.memegenerator.net/Instance_Create';
	$apiKey = 'YOUR_MEMEGENERATOR_API_KEY';
	
	if ($query == null){
		$result = new TextMessageBuilder("Meme Generator\n\nUsage:\n/memeid query\n/meme memeid topText|bottomText\n\nExample:\n/memeid One Does Not Simply\n/meme 689854 one does not simply|make memes using line messenger");
	} else {
		
		$query = explode(' ', $query, 2);
		$generatorID = urlencode($query[0]);
		
		$text = explode('|', $query[1]);
		$teksAtas = urlencode($text[0]);
		$teksBawah = urlencode($text[1]);

		$URL = $URL . '?generatorID=' . $generatorID;
		$URL = $URL . '&text0=' . $teksAtas;
		$URL = $URL . '&text1=' . $teksBawah;
		$URL = $URL . '&apiKey=' . $apiKey;
		
		$json = file_get_contents($URL);
		$json = json_decode($json, true);
		
		$imageUrl = $json['result']['instanceImageUrl'];
		
		if ($imageUrl == null){
			$result = new TextMessageBuilder('Syntax error or generatorID not found.');
		} else {
			$result = new ImageMessageBuilder($imageUrl, $imageUrl);
		}
		
	}
	
	return $result;

}
