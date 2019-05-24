<?php

// https://app.codility.com/demo/results/trainingS4CSYJ-3RY/

/**
 * Find the gap
 *
 * @param $N
 * @return bool|int
 */
function solution($N)
{
    // covert to binary
    $binary = decbin($N);

    // explode with 1
    // if N = 1041, binary representation is - 10000010001
    // after explode we'll get [null, 00000, 000, null]
    $explodes = explode("1", $binary);
    $lastIndex = sizeof($explodes) - 1;

    // remove unnecessary arrays, i.e. remove all nulls
    // array_filter will preserve the array keys
    // which will leave us with [00000, 000]
    $explodes = array_filter(array_unique($explodes), 'is_numeric');

    // set the max size to 0
    $maxSize = 0;

    // traverse through each element and find the max 0's
    foreach ($explodes as $key => $value) {
        $length = strlen((string)$value);
        // current length is more than max and is not the last index
        // last index will not have, zeros that is surrounded by ones at both ends
        if ($length > $maxSize && $key < $lastIndex) {
            $maxSize = $length;
        }
    }

    return $maxSize;
}
