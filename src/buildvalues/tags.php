<?php

namespace Vkapi\build\buildvalues;

use function Vkapi\parser\getValue;

function buildHashTags($data)
{
    $separator = ' ';
    $text = getValue($data, ['object', 'text']);
    $stripTags = strip_tags($text);
    $strReplaced = str_replace(array("\r", "\n", "\r\n", "\n\r"), $separator, $stripTags);
    $exploded = explode($separator, $strReplaced);
    $filtered = array_filter($exploded, fn ($item) => stristr($item, '#'));
    $trimmed = array_map(fn ($item) => trim($item, '#'), $filtered);
    return array_values($trimmed);
}
