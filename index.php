<?php
 
 $GET_INPUT = file_get_contents('php://input');

 require_once 'config.php';
 require_once 'function.php';
 //$event['message']['text']

 $event = json_decode($GET_INPUT, 1);

 if (mb_strtolower($event['message']['text']) == '/start') {
    $autoAnswer = 'Приветствую красивый человек ' . $event['message']['from']['first_name'];
 } else {
    $autoAnswer = 'Не знаю такие слова ' . $board['message']['text'] . "?\nХозяин пока что не научил;)";
 }

 getTelegramApi('sendMessage',
    [
        'text' => $autoAnswer,
        'chat_id' => $event['message']['chat']['id']
    ]
);

$client = new \Trello\Client($api_key);
$url = $client->getAuthorizationUrl('some app name', 'https://trellobot.azurewebsites.net');
header("Location: {$url}");
$client->setAccessToken($returned_token);
$member_obj = new \Trello\Model\Member($client);
$member_obj->setId('userid');
$orgs = $member_obj->getOrganizations();
$board = $client->getBoard($board_id);



?>