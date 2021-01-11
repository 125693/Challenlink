<?php

function findPoint($strArr)
{
    // code goes here
    $common_numbers = [];
    $list1_numbers = array_map('intval', explode(',', $strArr[0]));
    $list2_numbers = array_map('intval', explode(',', $strArr[1]));

    for ($i = 0; $i < count($list1_numbers); $i++) {
        $j = 0;
        do {
            if ($list2_numbers[$j] == $list1_numbers[$i]) {
                array_push($common_numbers, $list1_numbers[$i]);
            }
            $j++;
        } while (count($list2_numbers) > $j && $list2_numbers[$j] <= $list1_numbers[$i]);
    }

    if (count($common_numbers) == 0) {
        return false;
    } else {
        return implode(',', $common_numbers);
    }

}

// keep this function call here
echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']) . PHP_EOL;
echo findPoint(['1, 3, 9, 10, 17, 18', '1, 4, 9, 10']) . PHP_EOL;
