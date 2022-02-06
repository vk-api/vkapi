<?php

namespace Vkapi\build\buildvalues;

use function Vkapi\parser\getPlayer;
use function Vkapi\parsers\object\getText;

function buildHashTags($data)
{
    $separator = ' ';
    $getText = getText($data);
    $stripTags = strip_tags($getText);
    $strReplaced = str_replace(array("\r", "\n", "\r\n", "\n\r"), $separator, $stripTags);
    $exploded = explode($separator, $strReplaced);
    $filtered = array_filter($exploded, fn ($item) => stristr($item, '#'));
    $trimmed = array_map(fn ($item) => trim($item, '#'), $filtered);
    return array_values($trimmed);
}
