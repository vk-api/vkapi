<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getAttachments, getValue, getGeo};

function wall_post_new($data)
{
    return [
        "type" => getValue($data, ['type']),
        "id" => getValue($data, ['object', 'id']),
        "from_id" => getValue($data, ['object', 'from_id']),
        "owner_id" => getValue($data, ['object', 'owner_id']),
        "date" => getValue($data, ['object', 'date']),
        "post_type" => getValue($data, ['object', 'post_type']),
        "text" => getValue($data, ['object', 'text']),
        "created_by" => getValue($data, ['object', 'created_by']),
        "signer_id" => getValue($data, ['object', 'signer_id']),
        "geo" => getGeo($data),
        "audio" => getAttachments($data, "audio"),
        "video" => getAttachments($data, "video"),
        "photo" => getAttachments($data, 'photo'),
        "poll" => getAttachments($data, 'poll'),
        "link" => getAttachments($data, 'link'),
        "doc" => getAttachments($data, 'doc'),
        "group_id" => getValue($data, ['group_id']),
        "event_id" => getValue($data, ['event_id'])
    ];
}
