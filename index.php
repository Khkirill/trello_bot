<?php
// composer
require 'vendor/autoload.php';

$bot = new \TelegramBot\Api\BotApi('5655249769:AAEVXMwzInCswFg6A_4t6aIAXDGG68vXVZ4');

$bot->sendMessage($chatId, $messageText);

?>