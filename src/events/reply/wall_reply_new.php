<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue};

function wall_reply_new($data)
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
        'reply_to_user' => getValue($data, ['object', 'reply_to_user']),
        'reply_to_comment' => getValue($data, ['object', 'reply_to_comment']),
        'post_owner_id' => getValue($data, ['object', 'post_owner_id']),
        'group_id' => getValue($data, ['object', 'group_id']),
        'event_id' => getValue($data, ['object', 'event_id']),
        'secret' => getValue($data, ['object', 'secret']),
    ];
}

