<?php

// https://app.codility.com/demo/results/trainingAV8HVX-UKP/

/**
 * Find the missing one
 *
 * @param $A
 * @return mixed|string
 */
function solution($A)
{
    // get the size of array
    $sizeOfArray = count($A);

    // size is zero, 1 is missing
    if ($sizeOfArray === 0) {
        return 1;
    }

    // since the number are in sequence
    // missing number would be the difference of range sum with actual sum
    return array_sum(range(1, $sizeOfArray + 1))  - array_sum($A);
}
