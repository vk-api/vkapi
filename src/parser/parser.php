<?php

namespace Vkapi\parser;

function getValue($data, $index)
{
    if (!isset($data[$index[0]])) {
        return '';
    }

    if (is_array($data[$index[0]])) {
        return getValue($data[array_shift($index)], $index);
    }

    return $data[$index[0]];
}

function getAttachments($data, $pattern)
{
    if (!isset($data['object']['attachments'])) {
        return [];
    }

    $filtered = array_filter($data['object']['attachments'], function ($item) use ($pattern) {
        if (getValue($item, ['type']) == $pattern) {
            return $item;
        }
    });

    $mapped = array_map(function ($item) {
        $type = getValue($item, ['type']);
        $postfix = ($type == 'link' || $type == 'poll' || $type == 'geo' || $type == 'doc') ? '' : '_new';
        $event = "Vkapi\\events\\event\\{$type}{$postfix}";
        $result = $event($item);
        return $result;
    }, $filtered);

    return $mapped;
}

function getPhotoOrFirstFrame($data, $pattern)
{
    $type = $data['type'] == 'video' ? 'video' : 'object';

    $filtered = array_filter($data[$type], function ($item) use ($pattern) {
        if (str_starts_with($item, $pattern) == true) {
            return $item;
        }
    }, ARRAY_FILTER_USE_KEY);

    return array_pop($filtered);
}

function getSizes($data)
{
    $type = $data['type'] == 'photo' ? 'photo' : 'object';

    $reduced = array_reduce($data[$type]['sizes'], function ($acc, $item) {
        return $item['width'] > $acc['width'] ? $item : $acc;
    }, $data[$type]['sizes'][0]);

    return $reduced['url'];
}

function getGeo($data)
{
    if (!isset($data['object']['geo'])) {
        return [];
    }

    return [
        'type' => getValue($data, ['object', 'geo', 'type']),
        'coordinates' => getValue($data, ['object', 'geo', 'coordinates']),
        "id" => getValue($data, ['object', 'geo', 'place', 'id']),
        "title" => getValue($data, ['object', 'geo', 'place', 'title']),
        "latitude" => getValue($data, ['object', 'geo', 'place', 'latitude']),
        "longitude" => getValue($data, ['object', 'geo', 'place', 'longitude']),
        "created" => getValue($data, ['object', 'geo', 'place', 'created']),
        "icon" => getValue($data, ['object', 'geo', 'place', 'icon']),
        "country" => getValue($data, ['object', 'geo', 'place', 'country']),
        "city" => getValue($data, ['object', 'geo', 'place', 'city']),
        'showmap' => getValue($data, ['object', 'geo', 'showmap']),
    ];
}
