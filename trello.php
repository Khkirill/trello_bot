<?php

$GET_INPUT = file_get_contents('php://input');

require_once 'config.php';
require_once 'function.php';


$event = json_decode($GET_INPUT, 1);

if ($event['action']['type'] == 'moveCardFromBoard') {
   $autoAnswer = 'Карточка была убрана ';
} 



if  ($event['action']['type'] == 'moveCardToBoard') {
    $autoAnswer = 'Карточка была добавлена ';
 }

 //$autoAnswer = "ZIG HAI";

$trello = -1001377394217;

$query = array(
    'key' => 'APIKey',
    'token' => 'APIToken'
  );
  
  $response = Unirest\Request::put(
    'https://api.trello.com/1/boards/{id}',
    $query
  );

var_dump($response);

getTelegramApi('sendMessage',
   [
       'text' => $response,
       'chat_id' => $trello
   ]
);


?>