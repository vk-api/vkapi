<?php

namespace Vkapi\parsers\post;

function getPostType($data)
{
    return $data['object']['post_type'];
}
