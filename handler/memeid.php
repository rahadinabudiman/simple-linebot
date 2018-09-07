<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function memeid($query, $userId){
	
	$URL = 'http://version1.api.memegenerator.net/Generators_Search';
	$apiKey = 'YOUR_MEMEGENERATOR_API_KEY';
	
	if ($query == null){
		$result = new TextMessageBuilder("Meme Generator\n\nUsage:\n/memeid query\n/meme memeid topText|bottomText\n\nExample:\n/memeid One Does Not Simply\n/meme 689854 one does not simply|make memes using line messenger");
	} else {

		$query = urlencode($query);
		$URL = $URL . '?q=' . $query;
		$URL = $URL . '&apiKey=' . $apiKey;
		
		$json = file_get_contents($URL);
		$json = json_decode($json, true);
		
		$generatorID = $json['result'][0]['generatorID'];
		
		if ($generatorID == null){
			$result = new TextMessageBuilder('GeneratorID not found.');
		} else {
			$result = new TextMessageBuilder('GeneratorID: ' . $generatorID);
		}
		
	}
	
	return $result;

}
