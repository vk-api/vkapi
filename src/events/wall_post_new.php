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
    getGeo
};
use function Vkapi\build\buildvalues\buildHashTags;
use function Vkapi\parsers\root\{getType, getGroupId, getEventId};
use function Vkapi\parsers\video\{getAccessKey, getAddingDate, getDescription,
    getPlatform, getPlayer, getTypeVideo, getVideo};
use function Vkapi\parsers\post\{getPostType};
use function Vkapi\parsers\audio\{getArtist, getUrl, getLyricsId, getGenreId,
    getIsHq};
use function Vkapi\parsers\photo\{getSizes};

function wall_post_new($data)
{
    return [
        "type" => getType($data),
        "id" => getId($data),
        "from_id" => getFromId($data),
        "owner_id" => getOwnerId($data),
        "date" => getDate($data),
        "post_type" => getPostType($data),
        "text" => getText($data),
        "created_by" => getCreatedBy($data),
        "signer_id" => getSignerId($data),
        "audio" => getAttachments($data, "audio"),
        "video" => getAttachments($data, "video"),
        "photo" => getAttachments($data, 'photo'),
        "geo" => getGeo($data),
        "poll" => getAttachments($data, 'poll'),
        "link" => getAttachments($data, 'link'),
        "group_id" => getGroupId($data),
        "event_id" => getEventId($data),
        "hash_tags" => buildHashTags($data)
    ];
}
