<?php

namespace Vkapi\requests\video;

function buildRequestVideoGet($access_token, $owner_id, $video_id, $v)
{
    $request_params = array(
        'access_token' =>  $access_token,
        'owner_id' => $owner_id,
        'videos' => $video_id,
        'v' => $v
    );

    $get_params = http_build_query($request_params);

    return "https://api.vk.com/method/video.get?{$get_params}";
}
