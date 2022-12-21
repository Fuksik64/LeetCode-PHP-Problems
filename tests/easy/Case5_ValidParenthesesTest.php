<?php

/*
 --------------------------------------------------------------------------
    Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.

    An input string is valid if:

    Open brackets must be closed by the same type of brackets.
    Open brackets must be closed in the correct order.
    Every close bracket has a corresponding open bracket of the same type.
 --------------------------------------------------------------------------
*/

function isValid(string $string): bool
{
//    Valid for pest but not for leet code interpreter
//        $replaced = str_replace(['()', '[]', '{}'], '', $string);
//        return $replaced === '';

    if (strlen($string) % 2 !== 0) {
        return false;
    }
    $separated = str_split($string);

    $map = [
        '(' => ')',
        '[' => ']',
        '{' => '}',
    ];

    $unclosedTags = [];
    foreach ($separated as $char) {

        if (array_key_exists($char, $map)) {
            $unclosedTags[] = $map[$char];
            continue;
        }

        if ($char !== array_pop($unclosedTags)) {
            return false;
        }

    }

    return count($unclosedTags) === 0;
}

test('case 5 valid parentheses', function ($strings, $result) {
    expect(isValid($strings))->toEqual($result);
})
    ->with([
        ["()", true],
        ["()[]{}", true],
        ["(]", false],
        ["([)]", false],
        ["{[]}", true],
        ["[", false],
        ["([]", false],
    ]);
