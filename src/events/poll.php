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
    getWidth, getUrl
};
use function Vkapi\build\buildvalues\buildHashTags;
use function Vkapi\parsers\root\{getType, getGroupId, getEventId};
use function Vkapi\parsers\video\{getAccessKey, getAddingDate, getDescription,
    getPlatform, getPlayer, getTypeVideo, getVideo};
use function Vkapi\parsers\post\{getPostType};
use function Vkapi\parsers\audio\{getArtist, getLyricsId, getGenreId,
    getIsHq};
use function Vkapi\parsers\photo\{getSizes};
use function Vkapi\parsers\link\{getCaption};

function poll($data)
{
    $type = getType($data);
    return [
        "type" => $type,
        "url" => getUrl($data, $type),
        "title" => getTitle($data, $type),
        "caption" => getCaption($data, $type),
        "description" => getDescription($data, $type),
        "photo" => getAttachments($data, 'link', 'photo'),
        "text" => getText($data, $type),
        "user_id" => getUserId($data, $type)
    ];
}
