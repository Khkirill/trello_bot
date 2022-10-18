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
    'key' => 'dc2351312f84a4ec3fefea1147940f5e',
    'token' => 'e1a0db5d124db5c1758c2e93626506e73fada3a90863ebc2dc370a2dcd52641a'
  );
  
  $response = Unirest\Request::put(
    'https://api.trello.com/1/boards/634d39b7f0d727005ad7c7b4',
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