<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue, getImage, rejectEmptyValues};

function photo_new($data)
{
    $type = getValue($data, ['type']);

    $paths = [
        "photo_new" => ['object'],
        "photo" => ["photo"],
        "link" => ["link", "photo"]
    ];

    $array = [
        "type" => getValue($data, ['type']),
        "id" => getValue($data, array_merge($paths[$type], ['id'])),
        "album_id" => getValue($data, array_merge($paths[$type], ['album_id'])),
        "owner_id" => getValue($data, array_merge($paths[$type], ['owner_id'])),
        "user_id" => getValue($data, array_merge($paths[$type], ['user_id'])),
        "text" => getValue($data, array_merge($paths[$type], ['text'])),
        "date" => getValue($data, array_merge($paths[$type], ['date'])),
        "image" => getImage($data)
    ];

    return rejectEmptyValues($array);
}
