<?php

// https://app.codility.com/demo/results/training8RUW65-56X/

/**
 * Returns the smallest positive integer (greater than 0) that does not occur in A.
 *
 * @param $A
 * @return int|mixed
 */
function solution($A)
{
    // max element is -ive, return 1
    $maxElement = max($A);
    if ($maxElement <= 0) {
        return 1;
    }

    // declare an empty array
    $positiveArray = [];

    // iterate through each element and get the positive element and removes duplicate
    foreach ($A as $item) {
        if ($item > 0 && !isset($positiveArray[$item])) {
            $positiveArray[$item] = $item;
        }
    }

    // assuming the minimum element is max + 1 (default)
    $minElement = $maxElement + 1;

    // iterate from 1 to max element and any missing key is our min element
    for ($i = 1; $i < $maxElement; $i++) {
        if (!isset($positiveArray[$i])) {
            $minElement = $i;

            break;
        }
    }

    return $minElement;
}
