<?php

use \LINE\LINEBot\MessageBuilder\ImageMessageBuilder as ImageMessageBuilder;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function instagram($query, $userId){
	
	if ($query == null){
		$result = new TextMessageBuilder("Instagram Random Photo\n\nUsage:\n/instagram userName\n\nExample:\n/instagram alrafikri");
	} else {
		
		$URL = 'https://www.instagram.com/' . $query;
		$instagramHtmlCode = file_get_contents($URL);
		$regex = '/"display_url":"(.*?)"/';
		
		preg_match_all($regex, $instagramHtmlCode, $result);
		
		$urlFound = $result[1];
		$urlCount = count($urlFound);
		
		$randomIndex = rand(0, $urlCount - 1);
		$randomUrl = $urlFound[$randomIndex];
		
		if ($randomUrl == null){
			$result = new TextMessageBuilder('Foto pada akun tidak ditemukan.');
		} else {
			$result = new ImageMessageBuilder($randomUrl, $randomUrl);
		}
		
	}
	
	return $result;
	
}
