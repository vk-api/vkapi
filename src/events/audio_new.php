<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue, rejectEmptyValues};

function audio_new($data)
{
    $array = [
        "type" => getValue($data, ["type"]),
        "id" => getValue($data, ["audio", "id"]),
        "owner_id" => getValue($data, ["audio", "owner_id"]),
        "artist" => getValue($data, ["audio", "artist"]),
        "title" => getValue($data, ["audio", "title"]),
        "duration" => getValue($data, ["audio", "duration"]),
        "url" => getValue($data, ["audio", "url"]),
        "lyrics_id" => getValue($data, ["audio", "lyrics_id"]),
        "album_id" => getValue($data, ["audio", "album_id"]),
        "genre_id" => getValue($data, ["audio", "genre_id"]),
        "date" => getValue($data, ["audio", "date"]),
        "is_hq" => getValue($data, ["audio", "is_hq"])
    ];

    return rejectEmptyValues($array);
}
