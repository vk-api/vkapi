<?php

namespace Vkapi\build\buildvalues;

use function Vkapi\parser\getPlayer;
use function Vkapi\parsers\object\getText;

function buildMessage($data, $case)
{
    $text = $data['object']['text'];
    $group_id = $data['group_id'];
    $post_id = $data['object']['post_id'];
    $id = $data['object']['id'];
    $thread = isset($data['object']['reply_to_comment']) ? "&thread={$data['object']['reply_to_comment']}" : '';
    $from_id = $data['object']['from_id'];

    $message = "{$text} {$case} https://vk.com/wall-{$group_id}_{$post_id}?reply={$id}{$thread} к посту 
                https://vk.com/wall-56308476_{$post_id}, автор коммента https://vk.com/id {$from_id}\n\n";

    return $message;
}
