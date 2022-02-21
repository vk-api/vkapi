<?php

namespace Vkapi\build\buildvalues;

function buildUserName($response)
{
    if ($response == '') {
        return [];
    }
    $data = json_decode($response, true);

    return [
        'id' => $data['response'][0]['id'],
        'first_name' => $data['response'][0]['first_name'],
        'last_name' => $data['response'][0]['last_name'],
    ];
}
