<?php

/*
 --------------------------------------------------------------------------
    You are given the heads of two sorted linked lists list1 and list2.

    Merge the two lists in a one sorted list. The list should be made by splicing together the nodes of the first two lists.

    Return the head of the merged linked list.
 --------------------------------------------------------------------------
*/

class ListNode
{
    public function __construct(public $val = 0, public $next = null)
    {
    }
}

function mergeTwoList(ListNode $list1, ListNode $list2): ListNode
{
    $newList = new ListNode(0);

    $currentNode = $newList;

    while ($list1 && $list2) {
        if ($list1->val < $list2->val) {
            $currentNode->next = $list1;
            $list1 = $list1->next;
        } else {
            $currentNode->next = $list2;
            $list2 = $list2->next;
        }

        $currentNode = $currentNode->next;
    }

    if ($list1) {
        $currentNode->next = $list1;
    }

    if ($list2) {
        $currentNode->next = $list2;
    }

    return $newList->next;
}

test('easy two sum', function ($list1, $list2, $result) {
    $fnResult = mergeTwoList($list1, $list2);
    $testResult = [];
    if ($fnResult->next->val !== null) {

        while (true) {

            $testResult[] = $fnResult->val;
            $fnResult = $fnResult->next;

            if (!$fnResult) {
                break;
            }
        }
    } elseif ($fnResult->val !== null) {
        $testResult = [$fnResult->val];

    }
    expect($testResult)->toEqual($result);
})
    ->with([
        [
            new ListNode(1, new ListNode(2, new ListNode(4))),
            new ListNode(1, new ListNode(3, new ListNode(4))),
            [1, 1, 2, 3, 4, 4]
        ],
        [
            new ListNode(null),
            new ListNode(null),
            []
        ],
        [
            new ListNode(null),
            new ListNode(0),
            [0]
        ],

    ]);
