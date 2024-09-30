<?php

function countPairs(array $numbers = [], $target = 0): int
{
    // maybe need the verify the numbers data
    $numbers = array_filter($numbers, 'is_numeric');

    // collection of the pairs
    $pairs = [];
    $usedKeys = [];
    foreach ($numbers as $k => $number) {
        $complement = $target - $number;
        // find the complement number in $numbers
        $key = array_search($complement, $numbers);
        // if not found then continue the loop
        if ($key === false) {
            continue;
        }

        // check it has been pushed to $pairs?
        if (!empty($pairs[$number]) || !empty($pairs[$complement])) {
            continue;
        }

        $pairs[$number] = $complement;
        array_push($usedKeys, $k);
    }

    return count($pairs);
}

// lets verify the function
// echo countPairs([1, 3, 2, 2, 3, 4], 5); // should return 2/
// echo countPairs([1, 1, 1, 1], 2); // should return 1?
echo countPairs([1, 2, 3, 4, 5, null, 'null', 'wrong'], 7); // should return 2?