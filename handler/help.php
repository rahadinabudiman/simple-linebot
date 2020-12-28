<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function help($query, $userId){
	
	$result = new TextMessageBuilder("LINE Messenger BOT k. Commands help\n\n \n\n /aboutme : Tentang Saya \n\n /calculate : Perhitungan -- /hitung for more info \n\n /teach : Teach Word and Answer \n\n © Rahadina Budiman Sundara, 2020");
	return $result;
	
}