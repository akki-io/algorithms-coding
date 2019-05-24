<?php

// https://app.codility.com/demo/results/trainingCPP67Y-9JZ/

/**
 * The earliest time when the frog can jump to the other side of the river.
 *
 * @param $X
 * @param $A
 * @return int|string
 */
function solution($X, $A)
{
    // variable initialization
    $leavesInRiver = [];
    $currentSum = 0;

    // we need leaves from 1 to X (which are sequential to show up)
    // lets get the sum of these
    $totalSumNeeded = array_sum(range(1, $X));

    // iterate through each item
    foreach ($A as $key => $value) {

        // only process if leaf appears at or before the destination
        if ($value <= $X) {
            // if leaf has not appeared before
            if (!isset($leavesInRiver[$value])) {
                // set the array key with value and increase the sum
                $leavesInRiver[$value] = $value;
                $currentSum += $value;
            }

            // check if the current sum equals to the required sum, if so that is the earliest second
            if ($currentSum === $totalSumNeeded) {
                return $key;
            }
        }
    }

    // no match, frog is stuck
    return -1;
}
