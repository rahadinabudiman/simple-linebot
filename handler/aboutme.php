<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function aboutme($query, $userId){
	
	$result = new TextMessageBuilder("LINE Messenger Bot\n\nFor practice purposes only.\n© Asif (blog.ashura.id), 2018");
	return $result;
	
}