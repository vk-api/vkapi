<?php

namespace Vkapi;
use function Vkapi\events\event\video;
use function Vkapi\events\event\video_new;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function \Vkapi\env\setEnv;
use function \Vkapi\readinput\readInput;
use function \Vkapi\parser\getValue;
use function \Vkapi\build\buildvalues\{buildMessage};
use function \Vkapi\requests\messages\buildRequestMessagesSend;
use function \Vkapi\response\response;

setEnv();
$data =  readInput('php://input');
$type = getValue($data, ['type']);
$event = "\\Vkapi\\events\\event\\{$type}";
$result = $event($data);
$message = buildMessage($result, $type);
$request = buildRequestMessagesSend($_ENV['CHAT_ID'], $message, $_ENV['ACCESS_TOKEN_78441729'], $_ENV['API']);
$response = response($request);
