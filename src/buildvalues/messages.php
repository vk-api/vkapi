<?php

namespace Vkapi\build\buildvalues;

use function Vkapi\parser\getPlayer;
use function Vkapi\parsers\object\getText;

function buildMessage($data, $case)
{
    $url = 'https://vk.com/wall-' . $data->group_id . '_' . $data->object->post_id . "?reply=" . $data->object->id;

    if (isset($data->object->reply_to_comment)) {
        $thread = $data->object->reply_to_comment;
        $url = $url . "&thread=" . $thread;
    }

    $message = $data->object->text . $case . $url . "к посту https://vk.com/wall-56308476_" . $data->object->post_id . ", автор коммента https://vk.com/id" . $data->object->from_id . "\n*******";

    return $message;
}
