<?php



require "vendor/autoload.php";

$access_token = 'PTKs1qARADFbxymTqYk2B2mADMAPJ3682bYxHc6bK0qJUXAWxMONLprw7WTtoAMvcMI8Pg1slbQyJNZspE40izNjimVqC0s2bmgkoLILLIy023GkqvogB3wWmEbPScWSmSsS5skK16IDMLcGsAxZzgdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'a4257578a963eaddcb26ce220438c3f6';

$pushID = 'U647c7f453213a7093de3778c295edb80';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







