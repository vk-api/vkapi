<?php

namespace Vkapi\response;

function response($request)
{
    return file_get_contents($request);
}
