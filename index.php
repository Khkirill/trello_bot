<?php
 
 $GET_INPUT = file_get_contents('php://input');

 require_once 'config.php';
 require_once 'function.php';

 $event = json_decode($GET_INPUT, 1);

 if (mb_strtolower($event['message']['text']) == '/start') {
    $autoAnswer = 'Приветствую красивый' . $event['message']['from']['first_name']['last_name'] . "\n";
 } else {
    $autoAnswer = 'Не знаю такие слова ' . $event['message']['text'] . "?\nХозяин пока что не научил;)";
 }

 getTelegramApi('sendMessage',
    [
        'text' => $autoAnswer,
        'chat_id' => $event['message']['chat']['id']
    ]
);
?>