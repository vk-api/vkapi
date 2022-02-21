<?php

namespace Vkapi\requests\messages;

function buildRequestMessagesSend($chat_id, $message, $access_token, $v)
{
    $request_params = array(
        'chat_id' => $chat_id,  //$_ENV['CHAT_ID']
        'random_id' => rand(0, 2147483640),
        'message' => $message,
        'access_token' => $access_token, //$_ENV["ACCESS_TOKEN"],
        'v' => $v // $_ENV["API"]
    );
    $get_params = http_build_query($request_params);
    return "https://api.vk.com/method/messages.send?{$get_params}";
}
