<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue, getPhotoOrFirstFrame};

function video_new($data)
{
    $type = $data['type'] == 'video' ? 'video' : 'object';
   
    return [
        "type" => getValue($data, ['type']),
        "id" => getValue($data, [$type, 'id']),
        "owner_id" => getValue($data, [$type, 'owner_id']),
        "title" => getValue($data, [$type, 'title']),
        "description" => getValue($data, [$type, 'description']),
        "duration" => getValue($data, [$type, 'duration']),
        "photo" => getPhotoOrFirstFrame($data, "photo"),
        "first_frame" => getPhotoOrFirstFrame($data, "first_frame"),
        "date" => getValue($data, [$type, 'date']),
        "adding_date" => getValue($data, [$type, 'adding_date']),
        "player" => getValue($data, [$type, 'player']),
        "platform" => getValue($data, [$type, 'platform']),
        "access_key" => getValue($data, ['object', 'access_key']),
        "width" => getValue($data, [$type, 'width']),
        "height" => getValue($data, [$type, 'height']),
        "user_id" => getValue($data, ['object', 'user_id']),
        "type_video" => getValue($data, ['video', 'type_video']),
    ];
}
