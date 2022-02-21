<?php

namespace Vkapi\requests\users;

function buildRequestUsersGet($access_token, $id, $v)
{
    $request_params = array(
        'access_token' => $access_token,
        'user_id' => $id,
        'v' => $v
    );

    $get_params = http_build_query($request_params);
    return "https://api.vk.com/method/users.get?{$get_params}";
}
