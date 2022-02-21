<?php

namespace Vkapi\parser;

function getValue(array $data, array $index)
{
    if (!isset($data[$index[0]])) {
        return '';
    }

    if (count($index) >= 2) {
        $indexFirst = array_shift($index);
        return getValue($data[$indexFirst], $index);
    }

    return $data[$index[0]];
}

function getAttachments(array $data, string $pattern, array $index = ['object', 'attachments'])
{
    if (!isset($data[$index[0]])) {
        return [];
    }

    if (count($index) >= 2) {
        $indexFirst = array_shift($index);
        return getAttachments($data[$indexFirst], $pattern, $index);
    }

    $filtered = array_filter($data[$index[0]], function ($item) use ($pattern) {
        if (getValue($item, ['type']) == $pattern) {
            return $item;
        }
    });

    return array_map(function ($item) {
        $type = getValue($item, ['type']);
        $event = "Vkapi\\events\\event\\{$type}";
        return $event($item);
    }, $filtered);
}

function getImage(array $data, string $pattern = 'sizes')
{
    if (!isset($data[$pattern])) {
        foreach ($data as &$value) {
            if (is_array($value)) {
                return getImage($value, $pattern);
            }
        }
        return;
    }

    $reduced = array_reduce($data[$pattern], function ($acc, $item) {
        return $item['width'] > $acc['width'] ? $item : $acc;
    }, $data[$pattern][0]);

    return $reduced['url'];
}

function getGeo(array $data, array $index = ['object', 'geo'])
{
    if (!isset($data[$index[0]])) {
        return [];
    }

    if (count($index) >= 2) {
        $indexFirst = array_shift($index);
        return getGeo($data[$indexFirst], $index);
    }

    return [
        'type' => getValue($data, ['geo', 'type']),
        'coordinates' => getValue($data, ['geo', 'coordinates']),
        "id" => getValue($data, ['geo', 'place', 'id']),
        "title" => getValue($data, ['geo', 'place', 'title']),
        "latitude" => getValue($data, ['geo', 'place', 'latitude']),
        "longitude" => getValue($data, ['geo', 'place', 'longitude']),
        "created" => getValue($data, ['geo', 'place', 'created']),
        "icon" => getValue($data, ['geo', 'place', 'icon']),
        "country" => getValue($data, ['geo', 'place', 'country']),
        "city" => getValue($data, ['geo', 'place', 'city']),
        'showmap' => getValue($data, ['geo', 'showmap']),
    ];
}

function rejectEmptyValues(array $array)
{
    $collection = collect($array);
    return $collection->filter()->all();
}
