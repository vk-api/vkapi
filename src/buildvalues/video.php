<?php

namespace Vkapi\build\buildvalues;

use function Vkapi\parser\getPlayer;
use function Vkapi\parsers\object\getText;

function buildVkVideoUrls($response)
{
    if ($response == []) {
        return '';
    }

    $result = json_decode($response);
    return getPlayer($result);
}
