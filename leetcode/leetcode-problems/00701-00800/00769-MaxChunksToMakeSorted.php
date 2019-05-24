<?php

class Solution
{
    public function maxChunksToSorted($A)
    {
        $answer = 0;
        $max = 0;

        for ($i = 0; $i < count($A); ++$i) {
            $max = max($max, $A[$i]);
            if ($max === $i) {
                $answer++;
            }
        }

        return $answer;
    }
}

echo (new Solution())->maxChunksToSorted([0]) . "\n";
echo (new Solution())->maxChunksToSorted([2,0,1,3]) . "\n";
//echo (new Solution())->maxChunksToSorted([4, 3, 2, 1, 0]) . "\n";
//echo (new Solution())->maxChunksToSorted([1, 0, 2, 3, 4]) . "\n";
echo (new Solution())->maxChunksToSorted([0, 2, 4, 3, 1, 6, 5, 9, 7, 8]) . "\n";
