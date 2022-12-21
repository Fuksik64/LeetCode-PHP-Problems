<?php

/*
 --------------------------------------------------------------------------
    Given an integer x, return true if x is a palindrome, and false otherwise.

    Palindrome: An integer is a palindrome when it reads the same forward and backward.
    For example, 121 is a palindrome while 123 is not.


 --------------------------------------------------------------------------
*/
function isPalindrome(int $number): bool
{
    if ($number < 0) {
        return false;
    }

    $string = (string) $number;
    $reversed = strrev($string);

    return $reversed === $string;
}


test('case 4 is palindrome', function ($number, $result) {
    expect(isPalindrome($number))->toBe($result);
})
    ->with([
        [121, true],
        [-121, false],
        [10, false],
    ]);