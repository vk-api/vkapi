<?php

namespace Vkapi\env;

function setEnv()
{
    $dotenv = new \Symfony\Component\Dotenv\Dotenv();
    $dotenv->load(dirname(__DIR__, 1) . '/.env', dirname(__DIR__, 1) . '/.env.dev');
}
