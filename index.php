<?php
// composer
require 'vendor/autoload.php';

//Подключаем вендор
include('vendor/autoload.php');

use Telegram\Bot\Api;

//Token Bot
$telegram = new Api('5655249769:AAEVXMwzInCswFg6A_4t6aIAXDGG68vXVZ4');
$result = $telegram -> getWebhookUpdates();

$text = $result["message"]["text"];
$chat_id = $result["message"]["chat"]["id"];
$name = $result["message"]["from"]["username"];
$keyboard = [["Последние статьи"],["Картинка"],["Гифка"]];

?>