<?php

namespace Vkapi\build\buildvalues;

use function Vkapi\parser\getPlayer;
use function Vkapi\parsers\object\getText;

function buildAutorName($response)
{
    if ($response == '') {
        return [];
    }
    $result = json_decode($response, true);

    $filtered = array_filter($result['response'][0], function ($item) {
        if ($item == 'first_name' || $item == 'last_name' || $item == 'id') {
            return $item;
        }
    }, ARRAY_FILTER_USE_KEY);

    $mapped = array_map(function ($item) {
        return is_int($item) ? "https://vk.com/id{$item}" : $item;
    }, $filtered);

    return $mapped;
}
