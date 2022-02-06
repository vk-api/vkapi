<?php

namespace Vkapi\parsers\photo;

function getSizes($data, $type)
{
    $reduced = array_reduce($data[$type]['sizes'], function ($acc, $item) use ($type) {
        return $item['width'] > $acc['width'] ? $item : $acc;
    }, $data[$type]['sizes'][0]);

    return $reduced['url'];
}




// function getSizes($data)
// {

//     print_r($data['object']['sizes']);

//     $mapped = array_map(function ($item) {
//         $elem = $item['photo']['sizes'];
//         return array_reduce($elem, function ($acc, $item) {
//             return $item['width'] > $acc['width'] ? $item : $acc;
//         }, $elem[0]);
//     }, $filtered);

//     return $mapped;
//     return array_map(fn ($item) => $item['url'], $mapped);
// }
