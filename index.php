<?php
// Bot TOKEN
 $token = "5655249769:AAEVXMwzInCswFg6A_4t6aIAXDGG68vXVZ4";
 $bot = new \TelegramBot\Api\Client($token);

 $bot->command('start', function ($message) use ($bot) {
    $answer = 'Добро пожаловать!';
    $bot->sendMessage($message->getChat()->getId, $answer);
 });

?>