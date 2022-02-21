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
use function \Vkapi\build\buildvalues\buildUserName;
use function \Vkapi\requests\users\buildRequestUsersGet;
use function \Vkapi\response\response;

setEnv();

$request = buildRequestUsersGet($_ENV['ACCESS_TOKEN_USER'], $_ENV['USER_ID'], $_ENV["API"]);
$response = response($request);
$name = buildUserName($response);


