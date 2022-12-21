<?php

/*
 --------------------------------------------------------------------------
    Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.
    You may assume that each input would have exactly one solution, and you may not use the same element twice.
    You can return the answer in any order.
 --------------------------------------------------------------------------
*/
function twoSum(array $nums, int $target): array
{
    $map = [];

    foreach ($nums as $i => $iValue) {
        $diff = $target - $iValue;

        if (array_key_exists($diff, $map)) {
            return [$i, $map[$diff]];
        }

        $map[$iValue] = $i;
    }
    return [];
}

test('easy two sum', function ($nums, $target, $result) {
    expect(array_diff(twoSum($nums, $target), $result))->toEqual([]);
})
    ->with([
        [[2, 7, 11, 15], 9, [0, 1]],
        [[3,2,4], 6, [1, 2]],
        [[3,3], 6, [0,1]],
    ]);
