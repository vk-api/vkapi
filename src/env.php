<?php

namespace Vkapi\env;

function setEnv()
{    
    $filename = file_exists('/.env') ? '/.env' : '/.env.dev';
    $dotenv = new \Symfony\Component\Dotenv\Dotenv();
    $dotenv->load(dirname(__DIR__, 1) . $filename);
}
