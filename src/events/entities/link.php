<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue, rejectEmptyValues};

function link($data)
{
    $array = [
        "type" => getValue($data, ['type']),
        "url" => getValue($data, ['link', 'url']),
        "title" => getValue($data, ['link', 'title']),
        "caption" => getValue($data, ['link', 'caption']),
        "description" => getValue($data, ['link', 'description']),
        "photo" => photo_new($data),
        "text" => getValue($data, ['link', 'text']),
        "user_id" => getValue($data, ['link', 'user_id'])
    ];

    return rejectEmptyValues($array);
}
