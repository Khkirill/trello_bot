<?php

$GET_INPUT = file_get_contents('php://input');

require_once 'config.php';
require_once 'function.php';


$event = json_decode($GET_INPUT, 1);

$trello = -1001377394217;

$action_id = $event['action']['id'];

$GET_INPUT_2 = file_get_contents('https://api.trello.com/1/actions/'.$action_id.'?key=dc2351312f84a4ec3fefea1147940f5e&token=e1a0db5d124db5c1758c2e93626506e73fada3a90863ebc2dc370a2dcd52641a');

$action = json_decode($GET_INPUT_2, 1);

if ($action['type'] == 'moveCardFromBoard') {
    $autoAnswer = 'Карточка была убрана с колонки ' . $action['data']['list']['name'];
 } 

 if ($action['type'] == 'moveCardToBoard') {
    $autoAnswer = 'Карточка была добавлена в колонку ' . $action['data']['list']['name'];
 }  




getTelegramApi('sendMessage',
   [
       'text' => $autoAnswer,
       'chat_id' => $trello
   ]
);


?>