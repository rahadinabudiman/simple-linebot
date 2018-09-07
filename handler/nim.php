<?php

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;

function nim($query, $userId){
	
    if ($query == null){
        $result = new TextMessageBuilder("ITB NIM Finder\nUsage:\n/nim [name] [page*]\n/nim [nim]\n\nExample:\n/nim asif\n/nim hummam rais 2\n/nim 16517222");
    } else {
        
        $page = 1;
        preg_match_all('!\d+!', $query, $nums);
        $nums = $nums[0];
        
        if (ctype_alpha($query[0])){
            
            $query = preg_replace('/[0-9]+/', '', $query);
            if (isset($nums[0]))
                $page = $nums[0];
        
        } else {
            
            $query = $nums[0];
            if (isset($nums[1]))
                $page = $nums[1];
            
        }
        
        $input = rtrim($query, ' ');
        $response = json_decode(file_get_contents('https://ashura.id/nim/api?input=' . urlencode($input) . '&page=' . urlencode($page)), true);

        $result = "Halaman " . $page . ":";

        if (isset($response)){
            
            foreach ($response as $res) {
                $result .= "\n\n" . $res['name'] . "\n";
                $result .= $res['nimF'] . ' ' . $res['nimS'];
            }
            $result .= "\n\n" . "Halaman selanjutnya:\n/nim " . $input . " " . ($page+1);
            
        } else {
            $result .= "\n" . "Tidak ditemukan.";
        }
        
        $result = new TextMessageBuilder($result);
        
    }

    return $result;

}