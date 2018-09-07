<?php

require 'vendor/autoload.php';

use LINE\LINEBot\SignatureValidator as SignatureValidator;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder as TextMessageBuilder;
foreach (glob("handler/*.php") as $handler){
	if ($handler != 'handler/post.php'){
		include $handler;
	}
}

$dotenv = new Dotenv\Dotenv('env');
$dotenv->load();

$configs =  [
	'settings' => ['displayErrorDetails' => true],
];
$app = new Slim\App($configs);

$app->get('/', function ($request, $response) {
	return "LINE bot SDK - blog.ashura.id";
});

$app->post('/', function ($request, $response)
{
	$body 	   = file_get_contents('php://input');
	$signature = $_SERVER['HTTP_X_LINE_SIGNATURE'];
	file_put_contents('php://stderr', 'Body: '.$body);
	
	if (empty($signature)){
		return $response->withStatus(400, 'Signature not set');
	}
	
	if($_ENV['PASS_SIGNATURE'] == false && ! SignatureValidator::validateSignature($body, $_ENV['CHANNEL_SECRET'], $signature)){
		return $response->withStatus(400, 'Invalid signature');
	}
	
	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);

	$data = json_decode($body, true);
	foreach ($data['events'] as $event)
	{
		if($userMessage == "/main"){
        $buttonTemplateBuilder = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder(
             "Yuk Main!",
             "Main",
             "https://instagram.fbdo2-1.fna.fbcdn.net/vp/eeaf8c8419e28b0f0215f301d13a7278/5C3BBC39/t51.2885-19/s150x150/37507934_260340384816036_1795743564672532480_n.jpg",
           [
        new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder('Yuk Main!','main'),
           ]
           );
        $templateMessage = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('Yuk Main!', $buttonTemplateBuilder);
        $result = $bot->replyMessage($event['replyToken'], $templateMessage);
        return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		if ($event['type'] == 'message')
		{
			if($event['message']['type'] == 'text')
			{


				// --------------------------------------------------------------- NOTICE ME...

				$inputMessage = $event['message']['text'];
				$userId = $event['source']['userId'];

				if ($inputMessage[0] == '/'){
					
					$inputMessage = ltrim($inputMessage, '/');
					$inputSplit = explode(' ', $inputMessage, 2);
					
					if ( function_exists( $inputSplit[0] ) ){
						$outputMessage = $inputSplit[0]( $inputSplit[1], $userId );
					} else {
						$cmds = '';
						$ctr = 0;
						foreach (glob("handler/*.php") as $handler){
							if ($handler != 'handler/post.php'){
								$ctr++;
								$regex = '/handler\/(.*?).php/';
								preg_match($regex, $handler, $result);
								if ($ctr > 1){
									$cmds .= ', ';
								}
								$cmds .= $result[1];
							}
						}
						
					}

					$result = $bot->replyMessage($event['replyToken'], $outputMessage);
					return $result->getHTTPStatus() . ' ' . $result->getRawBody();
					
				} else {
					
					$wordsLearned = file_get_contents('https://wwyetti.firebaseio.com/words.json');
					$wordsLearned = json_decode($wordsLearned, true);
					
					foreach ($wordsLearned as $word => $answer){
						if (strpos(strtolower($inputMessage), $word) !== false){
							$outputMessage = new TextMessageBuilder($answer);
							$result = $bot->replyMessage($event['replyToken'], $outputMessage);
							return $result->getHTTPStatus() . ' ' . $result->getRawBody();
							break;
						}
					}
					
				}

				// --------------------------------------------------------------- ...SENPAI!
				 
        }

			}
		}
	}

});

$app->run();