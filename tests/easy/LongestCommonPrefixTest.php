<?php

/*
 --------------------------------------------------------------------------
    Write a function to find the longest common prefix string amongst an array of strings.
    If there is no common prefix, return an empty string "".
 --------------------------------------------------------------------------
*/

function longestCommonPrefix(array $stringsArray)
{

    $word = $stringsArray[0];

    if (count($stringsArray) === 0) {
        return $word;
    }

    $letters = str_split($word);

    $result = '';
    foreach ($letters as $letter) {
        foreach ($stringsArray as $key => $str) {
            if (substr($str, 0, 1) !== $letter) {
                break 2;
            }

            $stringsArray[$key] = substr($str, 1);
        }
        $result .= $letter;

    }
    return $result;
}

test('easy two sum', function ($strings, $result) {
    expect(longestCommonPrefix($strings))->toEqual($result);
})
    ->with([
        [["flower", "flow", "flight"], 'fl'],
        [["dog", "racecar", "car"], ''],
    ]);
