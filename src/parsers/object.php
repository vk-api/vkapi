<?php

namespace Vkapi\parsers\object;

function getId($data, $entity = 'object')
{
    return $data[$entity]['id'];
}

function getAlbumId($data, $entity = 'object')
{
    return isset($data['audio']['album_id']) ? $data['audio']['album_id'] : '';
}

function getUserId($data, $entity = 'object')
{
    return isset($data[$entity]['user_id']) ? $data['object']['user_id'] : '';
}

function getDate($data, $entity = 'object')
{
    return $data[$entity]['date'];
}

function getText($data, $entity = 'object')
{
    return isset($data[$entity]['text']) ? $data[$entity]['text'] : '';
}


function getOwnerId($data, $entity = 'object')
{
    return $data[$entity]['owner_id'];
}


function getAttachments($data, $pattern)
{
    if (!isset($data['object']['attachments'])) {
        return [];
    }

    $filtered = array_filter($data['object']['attachments'], function ($item) use ($pattern) {
        if (\Vkapi\parsers\root\getType($item) == $pattern) {
            return $item;
        }
    });

    $mapped = array_map(function ($item) {
        $type = \Vkapi\parsers\root\getType($item);
        $postfix = ($type == 'link' || $type == 'poll' ) ? '' : '_new';
        $event = "Vkapi\\events\\event\\{$type}{$postfix}";
        $result = $event($item);
        return $result;
    }, $filtered);

    return $mapped;
}


function getCreatedBy($data, $entity = 'object')
{
    return $data[$entity]['created_by'];
}


function getFromId($data, $entity = 'object')
{
    return $data[$entity]['from_id'];
}


function getSignerId($data)
{
    return isset($data['signer_id']) ? $data['signer_id'] : '';
}

function getTitle($data, $entity = 'object')
{
    return $data[$entity]['title'];
}


function getDuration($data, $entity = 'object')
{
    return $data[$entity]['duration'];
}


function getPhoto($data, $entity = 'object')
{
    $filtered = array_filter($data[$entity], function ($item) {
        if (str_starts_with($item, 'photo') == true) {
            return $item;
        }
    }, ARRAY_FILTER_USE_KEY);

    return array_pop($filtered);
}

function getFirstFrame($data, $entity = 'object')
{
    $filtered = array_filter($data[$entity], function ($item) {
        if (str_starts_with($item, 'first_frame') == true) {
            return $item;
        }
    }, ARRAY_FILTER_USE_KEY);

    return array_pop($filtered);
}

function getWidth($data, $entity = 'object')
{
    return isset($data[$entity]['width']) ? $data[$entity]['width'] : '';
}

function getHeight($data, $entity = 'object')
{
    return isset($data[$entity]['height']) ? $data[$entity]['height'] : '';
}

function getUrl($data, $entity = 'object')
{
    return $data[$entity]['url'];
}

function getGeo($data) {
    return isset($data['object']['geo']) ? $data['object']['geo'] : [];
}