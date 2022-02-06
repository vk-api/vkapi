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

function wall_reply_new($data)
{
}
function wall_reply_edit($data)
{
}
function wall_reply_delete($data)
{
}
function wall_reply_restore($data)
{
}
