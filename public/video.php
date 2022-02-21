<?php

namespace Vkapi;

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

use function \Vkapi\build\buildvalues\buildVideoUrl;
use function \Vkapi\requests\video\buildRequestVideoGet;
use function \Vkapi\response\response;

setEnv();

$data =  readInput('php://input');
$type = getValue($data, ['type']);
$event = "\\Vkapi\\events\\event\\{$type}";
$result = $event($data);

$videos = array_map(function($item) {
    $request = buildRequestVideoGet($_ENV['ACCESS_TOKEN_VIDEO'], $item['owner_id'], "{$item['owner_id']}_{$item['id']}_{$item['access_key']}", $_ENV["API"]);
    $response = response($request);
    $name = buildVideoUrl($response);
    return $name;
}, $result['video']);
