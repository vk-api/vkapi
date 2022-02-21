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

setEnv();
$data =  readInput('php://input');
$type = getValue($data, ['type']);
$event = "\\Vkapi\\events\\event\\{$type}";
$result = $event($data);
