<?php

namespace Vkapi\responses\users;

function getUsers($request)
{
    return file_get_contents($request);
}
