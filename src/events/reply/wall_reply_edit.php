<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue, getAttachments, rejectEmptyValues};

function wall_reply_edit($data)
{
    $array = [
        'type' => getValue($data, ['type']),
        'id' => getValue($data, ['object', 'id']),
        'from_id' => getValue($data, ['object', 'from_id']),
        'date' => getValue($data, ['object', 'date']),
        'text' => getValue($data, ['object', 'text']),
        'post_id' => getValue($data, ['object', 'post_id']),
        'owner_id' => getValue($data, ['object', 'owner_id']),
        'parents_stack' => getValue($data, ['object', 'parents_stack']),
        "audio" => getAttachments($data, "audio", ['object', 'attachments']),
        "video" => getAttachments($data, "video", ['object', 'attachments']),
        "photo" => getAttachments($data, 'photo', ['object', 'attachments']),
        "geo" => getValue($data, ['object', 'geo']),
        "poll" => getAttachments($data, 'poll', ['object', 'attachments']),
        "link" => getAttachments($data, 'link', ['object', 'attachments']),
        'thread' => getValue($data, ['object', 'thread']),
        'post_owner_id' => getValue($data, ['object', 'post_owner_id']),
        'group_id' => getValue($data, ['object', 'group_id']),
        'event_id' => getValue($data, ['object', 'event_id']),
        'secret' => getValue($data, ['secret']),
    ];
    return rejectEmptyValues($array);
}
