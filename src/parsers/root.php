<?php

namespace Vkapi\parsers\root;

function getType($data)
{
    return $data['type'];
}

function getGroupId($data)
{
    return $data['group_id'];
}

function getEventId($data)
{
    return $data['event_id'];
}

function getValue($data, $index)
{
    if (!isset($data[$index[0]])) {
        return null;
    }

    if (is_array($data[$index[0]])) {
        return getValue($data[array_shift($index)], $index);
    }

    return $data[$index[0]];
}
