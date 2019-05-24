<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$count = 0;
$A = [];

while ($line = fgets($_fp)) {
    if ($count === 1) {
        $A = explode(" ", $line);
    }
    $count++;
}

meanMedianMode($A);

function meanMedianMode($A)
{
    // if not an array or empty array
    if (!is_array($A) || !count($A)) {
        return "INVALID_INPUT";
    }

    sort($A);

    // get the mean
    echo mean($A) . "\n";

    // get the median
    echo  median($A) . "\n";

    // get the mode
    echo  mode($A) . "\n";
}

function mean($A)
{
    return round(array_sum($A)/count($A), 1);
}

function median($A)
{
    $sizeOfArray = count($A);

    // if odd number of records
    if ($sizeOfArray % 2 == 1) {
        return round($A[ceil($sizeOfArray/2)], 1);
    }

    return round(($A[$sizeOfArray/2 - 1] + $A[$sizeOfArray/2])/2, 1);
}

function mode($A)
{
    $arrayWithFrequency = array_count_values($A);

    // Might be a better idea to traverse manually wrt performance
    return min(array_keys($arrayWithFrequency, max($arrayWithFrequency)));
}
