<?php

// https://app.codility.com/demo/results/trainingW8A434-CMM/

/**
 * Shit an array by N
 *
 * @param $A
 * @param $K
 * @return string|array
 */
function solution($A, $K)
{
    // get the size of the array
    $sizeOfArray = count($A);

    // if no shift needed OR no elements in array or shift is factor of size i.e round robin
    if ($K === 0 || $sizeOfArray === 0 || $K % $sizeOfArray === 0) {
        return $A;
    }

    // get the calculation count
    // - if shift is more than the size of array, ignore the round robin scenario and only shift with remainder
    // - else shift with the corresponding input
    // so if size of array is 5 and shift value i.e. K = 12, we only need to shift by 2 as 10 is a multiple for 5
    $calculationCount = $K > $sizeOfArray ? $K % $sizeOfArray : $K;

    // slice the array into two part, based on the calculation
    $firstSlice = array_slice($A, $sizeOfArray - $calculationCount, $calculationCount);
    $secondSlice = array_slice($A, 0, $sizeOfArray - $calculationCount);

    // return the merged array
    return array_merge($firstSlice, $secondSlice);
}
