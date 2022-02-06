<?php

namespace Vkapi\readinput;

function readInput($input)
{
    return json_decode(file_get_contents($input), true);
}
