<?php

namespace Vkapi\responses\video;

function getVideo($request)
{
    return file_get_contents($request);
}
