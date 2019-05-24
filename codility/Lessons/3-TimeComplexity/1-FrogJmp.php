<?php

// https://app.codility.com/demo/results/trainingGQUANJ-9BZ/

/**
 * Get minimal number of jumps
 *
 * @param $X
 * @param $Y
 * @param $D
 * @return string
 */
function solution($X, $Y, $D)
{
    // simple match, use ceil
    return (int)ceil(($Y-$X)/$D);
}
