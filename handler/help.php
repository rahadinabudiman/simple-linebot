<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function help($query, $userId){
	
	$result = new TextMessageBuilder("LINE Messenger BOT k. Commands help \n\n /aboutme : Tentang Saya \n\n /userid : Memberi tahu userid Anda \n\n /kerang : Kerang ajaib akan memberi tahu anda sebuah jawaban! \n\n /calculate : Perhitungan -- /hitung for more info \n\n /teach : Teach Word and Answer \n\n /xkcd : Share random photos from xkcd \n\n © Rahadina Budiman Sundara, 2020");
	return $result;
	
}