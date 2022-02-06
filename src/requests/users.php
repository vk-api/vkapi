<?php

namespace Vkapi\requests\users;

function getUsers($access_token, $id, $v)
{
    $request_params = array(
        'access_token' => $access_token, //$_ENV["ACCESS_TOKEN"],
        'user_id' => $id,
        'v' => $v //$_ENV["API"]
    );

    $get_params = http_build_query($request_params);
    return "https://api.vk.com/method/users.get?{$get_params}";
}
