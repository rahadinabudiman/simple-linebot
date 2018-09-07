<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function aboutme($query, $userId){
	
	$result = new TextMessageBuilder("LINE Messenger Bot\n\n© YETTI SKUWAD, 2018");
	return $result;
	
}