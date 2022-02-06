<?php

namespace Vkapi\parsers\link;

function getCaption($data, $entity = 'link')
{
    return $data[$entity]['caption'];
}
