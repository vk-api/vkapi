<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue};

function doc($data)
{
    return [
        "type" => getValue($data, ['type']),
        "id" => getValue($data, ['doc', 'id']),
        "owner_id" => getValue($data, ['doc', 'owner_id']),
        "title" => getValue($data, ['doc', 'title']),
        "size" => getValue($data, ['doc', 'size']),
        "ext" => getValue($data, ['doc', 'ext']),
        "date" => getValue($data, ['doc', 'date']),
        "doc_type" => getValue($data, ['doc', 'type']),
        "url" => getValue($data, ['doc', 'url']),
        "access_key" => getValue($data, ['doc', 'access_key']),
    ];
}
