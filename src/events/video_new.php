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
use function Vkapi\parsers\root\{getType, getGroupId, getEventId};
use function Vkapi\parsers\video\{getAccessKey, getAddingDate, getDescription,
    getPlatform, getPlayer, getTypeVideo, getVideo};
use function Vkapi\parsers\post\{getPostType};
use function Vkapi\parsers\audio\{getArtist, getUrl, getLyricsId, getGenreId,
    getIsHq};
use function Vkapi\parsers\photo\{getSizes};

function video_new($data)
{
    $type = getType($data) == 'video' ? 'video' : 'object';
    return [
        "type" => $type,
        "id" => getId($data, $type),
        "owner_id" => getOwnerId($data, $type),
        "title" => getTitle($data, $type),
        "description" => getDescription($data, $type),
        "duration" => getDuration($data, $type),
        "photo" => getPhoto($data, $type),
        "first_frame" => getFirstFrame($data, $type),
        "date" => getDate($data, $type),
        "adding_date" => getAddingDate($data),
        "player" => getPlayer($data),
        "platform" => getPlatform($data),
        "access_key" => getAccessKey($data),
        "width" => getWidth($data, $type),
        "height" => getHeight($data, $type),
        "user_id" => getUserId($data),
        "type_video" => getTypeVideo($data),
    ];
}
