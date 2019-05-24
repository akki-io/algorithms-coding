<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$count = 0;
$A = [];
$F = [];

while ($line = fgets($_fp)) {
    if ($count === 1) {
        $A = explode(" ", $line);
    }
    if ($count === 2) {
        $F = explode(" ", $line);
    }
    $count++;
}

weightedMean($A, $F);

function weightedMean($A, $F)
{
    $sizeOfArray = count($A);
    $numerator = 0;
    $denominator = array_sum($F);

    for ($i = 0; $i < $sizeOfArray; $i++) {
        $numerator = $numerator + ($A[$i] * $F[$i]);
    }

    echo sprintf("%.1f", $numerator/$denominator) . "\n";
}
