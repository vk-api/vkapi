<?php

namespace Vkapi\parsers\video;

function getDescription($data, $entity)
{
    return $data[$entity]['description'];
}

function getAddingDate($data)
{
    return isset($data['object']['adding_date']) ? $data['object']['adding_date'] : '';
}

function getPlayer($data)
{
    return isset($data['object']['player']) ? $data['object']['player'] : '';
}

function getPlatform($data)
{
    return isset($data['object']['platform']) ? $data['object']['platform'] : '';
}

function getAccessKey($data)
{
    return isset($data['object']['access_key']) ? $data['object']['access_key'] : '';
}

function getTypeVideo($data)
{
    return isset($data['object']['type_video']) ? $data['object']['type_video'] : '';
}

function getVideo($data)
{
    $attachments = getattachments($data);

    if ($attachments == []) {
        return [];
    }

    $filtered = array_filter($attachments, fn ($item) => $item['type'] == "video");

    $mapped = array_map(function ($item) {
        $elem = $item['photo']['sizes'];
        return array_reduce($elem, function ($acc, $item) {
            return $item['width'] > $acc['width'] ? $item : $acc;
        }, $elem[0]);
    }, $filtered);

    return array_map(fn ($item) => $item['url'], $mapped);


    $youtubeLink = array();
    $text = getText($data);

    if (strpos($text, 'www.youtube.com') !== false) {
        $youtubeString = stristr($text, 'www.youtube.com');
        $str = str_replace(array("\r", "\n", "\r\n", "\n\r"), '|', $youtubeString);
        $arr = explode('|', $str);
        $youtubeLink[0] = $arr[0];
        $youtubeLink[1] = substr($youtubeLink[0], 24, 34);
    } elseif (strpos($text, 'youtu.be') !== false) {
        $youtubeString = stristr($text, 'youtu.be');
        $str = str_replace(array("\r", "\n", "\r\n", "\n\r"), '|', $youtubeString);
        $arr = explode('|', $str);
        $youtubeLink[0] = $arr[0];
        $youtubeLink[1] = substr($youtubeLink[0], 9, 19);
    }
    return $youtubeLink;
}
