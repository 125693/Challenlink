<?php
error_reporting(0);
function noIterate($strArr)
{
    // code goes here
    $str = $strArr[0];
    $pat = $strArr[1];
    $len1 = strlen($str);
    $len2 = strlen($pat);

    $hash_pat = array_fill(0, 0, 0);
    $hash_str = array_fill(0, 0, 0);
    for ($i = 0; $i < $len2; $i++) {
        $hash_pat[ord($pat[$i])]++;
    }

    $start = 0;
    $start_index = -1;
    $min_len = PHP_INT_MAX;

    // start traversing the string
    $count = 0; // count of characters
    for ($j = 0; $j < $len1; $j++) {
        // count occurrence of characters
        // of string
        $hash_str[ord($str[$j])]++;

        // If string's char matches with
        // pattern's char then increment count
        if ($hash_pat[ord($str[$j])] != 0 &&
            $hash_str[ord($str[$j])] <=
            $hash_pat[ord($str[$j])]) {
            $count++;
        }

        // if all the characters are matched
        if ($count == $len2) {
            // Try to minimize the window i.e.,
            // check if any character is occurring
            // more no. of times than its occurrence
            // in pattern, if yes then remove it from
            // starting and also remove the useless
            // characters.
            while ($hash_str[ord($str[$start])] >
                $hash_pat[ord($str[$start])] ||
                $hash_pat[ord($str[$start])] == 0) {

                if ($hash_str[ord($str[$start])] >
                    $hash_pat[ord($str[$start])]) {
                    $hash_str[ord($str[$start])]--;
                }

                $start++;
            }

            // update window size
            $len_window = $j - $start + 1;
            if ($min_len > $len_window) {
                $min_len = $len_window;
                $start_index = $start;
            }
        }
    }

    // If no window found
    if ($start_index == -1) {
        echo "No such window exists";
        return "";
    }

    // Return substring starting from
    // start_index and length min_len
    return substr($str, $start_index, $min_len);
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]) . PHP_EOL;
echo noIterate(["aaffhkksemckelloe", "fhea"]) . PHP_EOL;
