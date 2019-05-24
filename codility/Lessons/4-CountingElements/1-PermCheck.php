<?php

/**
 * Check whether array A is a permutation.
 * https://app.codility.com/demo/results/trainingJ529FW-GMF/
 * this one don't have 100% performance.
 *
 * @param $A
 * @return int
 */
function solutionOld($A)
{
    // for a permutation
    // max element should be equal to count of the array
    // all elements should be unique
    if (count($A) === max($A) && count(array_unique($A)) === count($A)) {
        return 1;
    }

    return 0;
}

/**
 * Check whether array A is a permutation.
 * https://app.codility.com/demo/results/training842QGB-84T/
 *
 * @param $A
 * @return int
 */

function solution($A)
{
    // initialize variables
    $uniqueArray = [];
    $uniqueArrayCount = 0;
    $originalArrayCount = 0;
    $originalArrayMax = null;

    // iterate through each element
    foreach ($A as $item) {
        // get the unique elements count using the unique array key's
        if (!isset($uniqueArray[$item])) {
            $uniqueArray[$item] = $item;
            $uniqueArrayCount += 1;
        }

        // get the max value of original array
        if (!isset($originalArrayMax) || $item > $originalArrayMax) {
            $originalArrayMax = $item;
        }

        // ge the original array count
        $originalArrayCount +=1;
    }

    // for a permutation
    // max element should be equal to count of the array
    // all elements should be unique
    if ($originalArrayCount === $originalArrayMax && $originalArrayCount === $uniqueArrayCount) {
        return 1;
    }

    return 0;
}
