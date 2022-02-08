<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue, getSizes};

function photo_new($data)
{
    $type = $data['type'] == 'photo' ? 'photo' : 'object';

    return [
        "type" => getValue($data, ['type']),
        "id" => getValue($data, [$type, 'id']),
        "album_id" => getValue($data, [$type, 'album_id']),
        "owner_id" => getValue($data, [$type, 'owner_id']),
        "user_id" => getValue($data, [$type, 'user_id']),
        "text" => getValue($data, [$type, 'text']),
        "date" => getValue($data, [$type, 'date']),
        "image" => getSizes($data)
    ];
}
