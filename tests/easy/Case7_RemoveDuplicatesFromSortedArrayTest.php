<?php

/*
 --------------------------------------------------------------------------
    Given an integer array nums sorted in non-decreasing order, remove the duplicates in-place such that each unique element appears only once. The relative order of the elements should be kept the same.

    Since it is impossible to change the length of the array in some languages, you must instead have the result be placed in the first part of the array nums.
    More formally, if there are k elements after removing the duplicates, then the first k elements of nums should hold the final result. It does not matter what you leave beyond the first k elements.

    Return k after placing the final result in the first k slots of nums.

    Do not allocate extra space for another array. You must do this by modifying the input array in-place with O(1) extra memory.
 --------------------------------------------------------------------------
*/


function removeDuplicates(&$nums):int
{
    $count = 0;
    $last = null;
    foreach ($nums as $index => $num) {
        if ($num === $last) {
            unset($nums[$index]);
            continue;
        }

        $last = $num;
        ++$count;
    }

    return $count;
}

test('case 7 remove duplicates from sorted array', function ($array, $result, $k) {
    $resK = removeDuplicates($array);
    sort($array,SORT_NUMERIC);
    expect($array)
        ->toEqual($result)
        ->and($resK)
        ->toBe($k);
})
    ->with([
        [[1, 1, 2], [1, 2], 2],
        [[0, 0, 1, 1, 1, 2, 2, 3, 3, 4], [0, 1, 2, 3, 4], 5]
    ]);