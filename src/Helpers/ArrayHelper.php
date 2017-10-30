<?php

function only($keys, $array) {
    $keys = (array)$keys;
    $array = (array)$array;

    return array_intersect_key($array, array_flip($keys));
}

function extractItem($key, $array)
{
    $item = $array[$key];
    unset($array[$key]);

    return [$item, $array];
}
