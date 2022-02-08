<?php

namespace Vkapi;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

\Vkapi\env\setEnv();

// $data = readInput(dirname('php://input');

$data = \Vkapi\readinput\readInput(dirname(__DIR__, 1) . '/tests/fixtures/entities/video_new.json');
//var_export($data);

$type = \Vkapi\parser\getValue($data, ['type']);
$event = "Vkapi\\events\\event\\{$type}";
$result = $event($data);

var_export($result);
