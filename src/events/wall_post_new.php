<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue, getAttachments, getGeo, rejectEmptyValues};

function wall_post_new($data)
{
    $array = [
        "type" => getValue($data, ['type']),

        "id" => getValue($data, ['object', 'id']),
        "from_id" => getValue($data, ['object', 'from_id']),
        "owner_id" => getValue($data, ['object', 'owner_id']),
        "date" => getValue($data, ['object', 'date']),
        "post_type" => getValue($data, ['object', 'post_type']),
        "text" => getValue($data, ['object', 'text']),
        "created_by" => getValue($data, ['object', 'created_by']),
        "signer_id" => getValue($data, ['object', 'signer_id']),
        "geo" => getGeo($data, ['object', 'geo']),

        "audio" => getAttachments($data, "audio"),
        "video" => getAttachments($data, "video"),
        "photo" => getAttachments($data, 'photo'),
        "poll" => getAttachments($data, 'poll'),
        "link" => getAttachments($data, 'link'),
        "doc" => getAttachments($data, 'doc'),

        "copy_history_id" => getValue($data, ['object', "copy_history", 0, 'id']),
        "copy_history_from_id" => getValue($data, ['object', "copy_history", 0, 'from_id']),
        "copy_history_owner_id" => getValue($data, ['object', "copy_history", 0, 'owner_id']),
        "copy_history_date" => getValue($data, ['object', "copy_history", 0, 'date']),
        "copy_history_post_type" => getValue($data, ['object', "copy_history", 0, 'post_type']),
        "copy_history_text" => getValue($data, ['object', "copy_history", 0, 'text']),
        "copy_history_created_by" => getValue($data, ['object', "copy_history", 0, 'created_by']),
        "copy_history_signer_id" => getValue($data, ['object', "copy_history", 0, 'signer_id']),
        "copy_history_geo" => getGeo($data, ['object', "copy_history", 0, 'geo']),

        "copy_history_audio" => getAttachments($data, "audio", ['object', 'copy_history', 0, 'attachments']),
        "copy_history_video" => getAttachments($data, "video", ['object', 'copy_history', 0, 'attachments']),
        "copy_history_photo" => getAttachments($data, 'photo', ['object', 'copy_history', 0, 'attachments']),
        "copy_history_poll" => getAttachments($data, 'poll', ['object', 'copy_history', 0, 'attachments']),
        "copy_history_link" => getAttachments($data, 'link', ['object', 'copy_history', 0, 'attachments']),
        "copy_history_doc" => getAttachments($data, 'doc', ['object', 'copy_history', 0, 'attachments']),

        "group_id" => getValue($data, ['group_id']),
        "event_id" => getValue($data, ['event_id'])
    ];

    return rejectEmptyValues($array);
}
