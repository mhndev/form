<?php

namespace mhndev\form;

/**
 * @param $arr
 * @return bool
 */
function isAssoc($arr)
{
    return array_keys($arr) !== range(0, count($arr) - 1);
}
