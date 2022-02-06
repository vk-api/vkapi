<?php

namespace Vkapi\parsers\audio;

function getArtist($data)
{
    return $data['audio']['artist'];
}


function getLyricsId($data)
{
    return isset($data['audio']['lyrics_id']) ? $data['audio']['lyrics_id'] : '';
}

function getGenreId($data)
{
    return isset($data['audio']['genre_id']) ? $data['audio']['genre_id'] : '';
}

function getIsHq($data)
{
    return $data['audio']['is_hq'];
}
