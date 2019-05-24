<?php

// https://app.codility.com/demo/results/trainingHBNKK3-TVP/

/**
 * Returns the values of the counters after each consecutive operation based on an array
 *
 * @param $N
 * @param $A
 * @return array
 */
function solution($N, $A)
{
    // initialize min and max value as 0
    $maxValue = 0;
    $minValue = 0;

    // create a array for counter and fill it with 0's
    $result = array_fill(0, $N, 0);

    // iterate through the main array
    foreach ($A as $key => $value) {

        // if the element value is N+1, all counters will be set to max value of the counter
        if ($value === $N + 1) {
            $minValue = $maxValue;
        }

        // if the element value is <= N
        // if the current value of the counter at value-1 is less than min, first set it to min
        // increase the counter at value-1 by 1
        // if the new value is more than max, set it to max
        if ($value <= $N) {
            if ($result[$value - 1] < $minValue) {
                $result[$value - 1] = $minValue;
            }

            $result[$value - 1] = $result[$value - 1] + 1;

            if ($result[$value - 1] > $maxValue) {
                $maxValue = $result[$value - 1];
            }
        }
    }

    // iterate through all result array and any value less than min will be set to min
    foreach ($result as $key => $value) {
        if ($value < $minValue) {
            $result[$key] = $minValue;
        }
    }

    return $result;
}
