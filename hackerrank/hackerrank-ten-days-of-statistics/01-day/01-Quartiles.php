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

function quartiles($A)
{
    sort($A);

    quartilesRecursive($A, 1);

}

function quartilesRecursive($A, $count)
{
    $sizeOfArray = count($A);

    // if odd number of records
    if ($sizeOfArray % 2 == 1) {
        $median = round($A[ceil($sizeOfArray/2)], 1);
    } else {
        $median = round(($A[$sizeOfArray/2 - 1] + $A[$sizeOfArray/2])/2, 1);
    }
}



quartiles([3,7,8,5,12,14,21,13,18]);