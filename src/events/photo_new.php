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
    getWidth
};
use function Vkapi\build\buildvalues\buildHashTags;
use function Vkapi\parsers\root\{getType, getGroupId, getEventId, getValue};
use function Vkapi\parsers\video\{getAccessKey, getAddingDate, getDescription,
    getPlatform, getPlayer, getTypeVideo, getVideo};
use function Vkapi\parsers\post\{getPostType};
use function Vkapi\parsers\audio\{getArtist, getUrl, getLyricsId, getGenreId,
    getIsHq};
use function Vkapi\parsers\photo\{getSizes};

function photo_new($data)
{
    $type = getType($data) == 'photo' ? 'photo' : 'object';
    var_dump($type);

    $type2 = getValue($data, ['type']) == 'photo' ? 'photo' : 'object';
    var_dump($type2);

    return [
        "type" => getType($data, $type),
        "id" => getId($data, $type),
        "album_id" => getAlbumId($data, $type),
        "owner_id" => getOwnerId($data, $type),
        "user_id" => getUserId($data),
        "text" => getText($data, $type),
        "date" => getDate($data, $type),
        "image" => getSizes($data, $type)
    ];
}
