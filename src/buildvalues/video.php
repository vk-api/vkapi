<?php

namespace Vkapi\build\buildvalues;

function buildVideoUrl($response)
{
    if ($response == []) {
        return '';
    }

    $result = json_decode($response, true);
    return $result['response']['items'][0]['player'];
}
