<?php

namespace Vkapi\build\buildvalues;

function buildMessage($data, $type)
{
    $cases = [
        'wall_reply_new' => "Новый коммент:",
        'wall_reply_edit' => "Коммент отредактирован:",
        'wall_reply_delete' => "Коммент удален:",
        'wall_reply_restore' => "Коммент восстановлен:"
    ];
    $line = '* * **  ***   ****';

    $text = $data['text'];
    $group_id = $data['group_id'] ?? '';
    $post_id = $data['post_id'];
    $id = $data['id'];
    $thread = isset($data['reply_to_comment']) ? "&thread={$data['reply_to_comment']}" : '';
    $from_id = $data['from_id'];

    $message = "{$line}\r\n{$text}\r\n{$cases[$type]} https://vk.com/wall-{$group_id}_{$post_id}?reply={$id}{$thread} к посту https://vk.com/wall-{$group_id}_{$post_id}, коммент: [id{$from_id}|автор]\r\n";

    return $message;
}
