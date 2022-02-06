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

function confirmation($data = "")
{
    $dotenv = new \Symfony\Component\Dotenv\Dotenv();
    $dotenv->load(dirname(__DIR__, 1) . '/.env', dirname(__DIR__, 1) . '/.env.dev');
    echo $_ENV["CONFIRMATION_TOKEN"];
}
