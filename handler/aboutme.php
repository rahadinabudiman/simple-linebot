<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function aboutme($query, $userId){
	
	$result = new TextMessageBuilder("LINE Messenger Bot\n\n© Rahadina Budiman Sundara, 2020");
	return $result;
	
}