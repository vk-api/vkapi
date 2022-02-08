<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue};

function wall_reply_delete($data)
{
    return [
        'type' => getValue($data, ['type']),
        'owner_id' => getValue($data, ['object', 'owner_id']),
        'id' => getValue($data, ['object', 'id']),
        'deleter_id' => getValue($data, ['object', 'deleter_id']),
        'post_id' => getValue($data, ['object', 'post_id']),
        'group_id' => getValue($data, ['group_id']),
        'event_id' => getValue($data, ['event_id']),
        'secret' => getValue($data, ['secret']),
    ];
}
