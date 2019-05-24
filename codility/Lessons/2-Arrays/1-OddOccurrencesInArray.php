<?php

// https://app.codility.com/demo/results/trainingU2YXP3-DM9/

/**
 * Find the odd one out
 *
 * @param $A
 * @return mixed|string
 */
function solution($A)
{
    // initialize an empty array
    $oddElement = [];

    // iterate through the main array
    // idea here is to set or unset the odd array key with the item value
    // we will be finally left with one element in odd array
    foreach ($A as $item) {
        if (isset($oddElement[$item])) {
            unset($oddElement[$item]);
        } else {
            $oddElement[$item] = $item;
        }
    }

    return current($oddElement);
}
