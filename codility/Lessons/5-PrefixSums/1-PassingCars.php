<?php

// https://app.codility.com/demo/results/trainingK6N568-S59/

/**
 * Returns count passing cars.
 * We say that a pair of cars (P, Q), where 0 ≤ P < Q < N, is passing
 * when P is traveling to the east and Q is traveling to the west.
 *
 * @param $A
 * @return int
 */
function solution($A)
{
    // variable initialization
    $totalCarsTravellingWest = array_sum($A);
    $totalPair = 0;

    // iterate through each item
    foreach ($A as $item) {
        // return −1 if the number of pairs of passing cars exceeds 1,000,000,000.
        if ($totalPair > 1000000000) {
            return -1;
        }

        // if item is 1, car is traveling west,
        // the number of car traveling west will reduce by one
        if ($item === 1) {
            $totalCarsTravellingWest -= 1;
        }

        // if item is 0, car is traveling east,
        // number of pairs would be equal to total cars travelling west
        if ($item === 0) {
            $totalPair += $totalCarsTravellingWest;
        }
    }

    return $totalPair;
}
