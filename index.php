<?php
 
 $GET_INPUT = file_get_contents('php://input');

 const TOKEN = '5655249769:AAEVXMwzInCswFg6A_4t6aIAXDGG68vXVZ4';

 const API_URL = 'https://api.telegram.org/bot';

 function printAnswer($str) {
    echo "<pre>";
    print_r($str);
    echo "</pre>";
 }

 function getTelegramApi($method, $options = null) {
    $str_request = API_URL . TOKEN . '/' . $method;

    if ($options) {
        $str_request .= '?' . http_build_query($options);
    }
    $request = file_get_contents($str_request);

    return json_decode($request, 1);
 }

 function setHook($set = 1) {
    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    printAnswer(
        getTelegramApi('setWebhook',
            [
                'url' => $set?$url:''
            ]
        )
    );
    exit();
 }

 $event = json_decode($GET_INPUT, 1);

 if (mb_strtolower($event['message']['text']) == 'привет') {
    $autoAnswer = 'Приветствую, тебя человек';
 } else {
    $autoAnswer = 'Привет';
 }

 getTelegramApi('sendMessage',
    [
        'text' => $autoAnswer,
        'chat_id' => $event['message']['chat']['id']
    ]
);
?>