<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getAttachments, getValue};

function link($data)
{
    return [
        "type" => getValue($data, ['type']),
        "url" => getValue($data, ['link', 'url']),
        "title" => getValue($data, ['link', 'title']),
        "caption" => getValue($data, ['link', 'caption']),
        "description" => getValue($data, ['link', 'description']),
        "photo" => getAttachments($data, 'link', 'photo'),
        "text" => getValue($data, ['link', 'text']),
        "user_id" => getValue($data, ['link', 'user_id'])
    ];
}
