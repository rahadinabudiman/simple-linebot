<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function apakah($query, $userId){
    if ($query == null){
        $result = new TextMessageBuilder("Kerang Ajaib Memberi Anda Sebuah Jawaban!\n\nCara Pakai:\n/apakah [pertanyaan]\n\nExample:\n/apakah aku lucu?");
    }
        else {
            $list_jwb = array(
                'Ya',
                'Tidak',
                'Bisa jadi',
                'Mungkin',
                'Tentu tidak',
                'Coba tanya lagi'
                 );
            $jaws = array_rand($list_jwb);
            $jawab = $list_jwb[$jaws];
            $result = new TextMessageBuilder($jawab);
        }
return($result);
}