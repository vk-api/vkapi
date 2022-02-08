<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getAttachments, getValue};

function wall_reply_edit($data)
{
    return [

        'type' => getValue($data, ['type']),
        'id' => getValue($data, ['object', 'id']),
        'from_id' => getValue($data, ['object', 'from_id']),
        'date' => getValue($data, ['object', 'date']),
        'text' => getValue($data, ['object', 'text']),
        'post_id' => getValue($data, ['object', 'post_id']),
        'owner_id' => getValue($data, ['object', 'owner_id']),
        //'parents_stack' => getValue($data, ['object', 'parents_stack']),
        "audio" => getAttachments($data, "audio"),
        "video" => getAttachments($data, "video"),
        "photo" => getAttachments($data, 'photo'),
        "geo" => getValue($data, ['object', 'geo']),
        "poll" => getAttachments($data, 'poll'),
        "link" => getAttachments($data, 'link'),
        //'thread' => getValue($data, ['object', 'thread']),
        'post_owner_id' => getValue($data, ['object', 'post_owner_id']),
        'group_id' => getValue($data, ['object', 'group_id']),
        'event_id' => getValue($data, ['object', 'event_id']),
        'secret' => getValue($data, ['secret']),
    ];
}
