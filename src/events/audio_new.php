<?php

namespace Vkapi\events\event;

use function Vkapi\parsers\object\{
    getDate,
    getCreatedBy,
    getFromId,
    getOwnerId,
    getText,
    getId,
    getAlbumId,
    getUserId,
    getAttachments,
    getSignerId,
    getDuration,
    getTitle,
    getFirstFrame,
    getPhoto,
    getHeight,
    getWidth,
    getUrl
};
use function Vkapi\build\buildvalues\buildHashTags;
use function Vkapi\parsers\root\{getType, getGroupId, getEventId, getValue};
use function Vkapi\parsers\video\{getAccessKey, getAddingDate, getDescription,
    getPlatform, getPlayer, getTypeVideo, getVideo};
use function Vkapi\parsers\post\{getPostType};
use function Vkapi\parsers\audio\{getArtist, getLyricsId, getGenreId,
    getIsHq};
use function Vkapi\parsers\photo\{getSizes};

function audio_new($data)
{
    return [
        "type" => getValue($data, ["type"]),
        "id" => getId($data, 'audio'),
        "owner_id" => getOwnerId($data, 'audio'),
        "artist" => getArtist($data),
        "title" => getTitle($data, 'audio'),
        "duration" => getDuration($data, 'audio'),
        "url" => getUrl($data, 'audio'),
        "lyrics_id" => getLyricsId($data),
        "album_id" => getAlbumId($data, 'audio'),
        "genre_id" => getGenreId($data),
        "date" => getDate($data, 'audio'),
        "is_hq" => getIsHq($data)
    ];
}
