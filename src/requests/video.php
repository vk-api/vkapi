<?php

namespace Vkapi\requests\video;

function getVideo($access_token, $owner_id, $video_id, $v)
{
    $request_params = array(
        'access_token' =>  $access_token, //$_ENV["ACCESS_TOKEN"],
        'owner_id' => $owner_id,
        'videos' => "{$owner_id}_{$video_id}",
        'v' => $v //$_ENV["API"]
    );

    $get_params = http_build_query($request_params);

    return "https://api.vk.com/method/video.get?{$get_params}";
}
