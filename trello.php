<?php

$GET_INPUT = file_get_contents('php://input');

require_once 'config.php';
require_once 'function.php';


$event = json_decode($GET_INPUT, 1);

if ($event['type'] == 'moveCardFromBoard') {
   $autoAnswer = 'Карточка была убрана ';
} 



if  ($event['type'] == 'moveCardToBoard') {
    $autoAnswer = 'Карточка была добавлена ';
 }


$autoAnswer = "Hi gitler";
 
$trello = 403768624;

getTelegramApi('sendMessage',
   [
       'text' => $autoAnswer,
       'chat_id' => $trello
   ]
);


?>