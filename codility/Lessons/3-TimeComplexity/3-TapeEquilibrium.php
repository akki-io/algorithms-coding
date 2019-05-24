<?php

// https://app.codility.com/demo/results/trainingTH75UW-XBQ/

/**
 * Returns the minimal difference that can be achieved with a break point
 *
 * @param $A
 * @return float|int|mixed
 */
function solution($A)
{
    // start with very beginning of the array, no element selected
    // left sum would be 0 as no elements are present
    // right sum would be the sum of array
    $currentLeftArraySum = 0;
    $currentRightArraySum = array_sum($A);

    // set the difference to null as we will set it in the first iteration
    $minimumAbsDifference  = null;

    // iterate through each element, for can be replaced with foreach
    for ($i = 0; $i < count($A) - 1; $i++) {

        // subtract the element value from the right array, as we are now moving one step from left to right
        $currentRightArraySum -= $A[$i];

        // left sum will be incremented with element value
        $currentLeftArraySum += $A[$i];

        // get the absolute different
        $currentAbsDifference = abs($currentLeftArraySum - $currentRightArraySum);

        // first iteration sets the minimum difference
        // after, we compare the current difference with minimum difference and set accordingly
        if (!isset($minimumAbsDifference) || $currentAbsDifference < $minimumAbsDifference) {
            $minimumAbsDifference = $currentAbsDifference;
        }
    }

    return $minimumAbsDifference;
}
