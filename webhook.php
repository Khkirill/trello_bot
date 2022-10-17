<?php
$headers = array(
    'Accept' => 'application/json'
  );
  
  $query = array(
    'callbackURL' => 'https://trellobot.azurewebsites.net',
    'idModel' => '634d39b7f0d727005ad7c7b4',
    'key' => 'dc2351312f84a4ec3fefea1147940f5e',
    'token' => 'e1a0db5d124db5c1758c2e93626506e73fada3a90863ebc2dc370a2dcd52641a'
  );
  
  $response = Unirest\Request::post(
    'https://api.trello.com/1/tokens/e1a0db5d124db5c1758c2e93626506e73fada3a90863ebc2dc370a2dcd52641a/webhooks',
    $headers,
    $query
  );
  
  var_dump($response);