<?php

namespace Vkapi\events\event;

function confirmation($data, $input = [
    [
        'group_id' => '',
        'secret' => '',
        'confirmation' => ''
    ],
])
{
    $filtered = array_filter($input, fn ($item) => $item['group_id'] == $data['group_id']);

    $result = array_filter($filtered, fn ($item) => $item['secret'] == $data['secret']);

    echo $result ? array_values($result)[0]['confirmation'] : '';
}
