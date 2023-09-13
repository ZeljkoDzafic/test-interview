<?php
function addNumbers(...$numbers) {
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

/*

function addNumbers(...$numbers) {
    return array_reduce($numbers, function ($carry, $number) {
        return $carry + $number;
    }, 0);
}
*/

$result1 = addNumbers(3, 5, 6);
echo "addNumbers(3, 5, 6): $result1\n";

$result2 = addNumbers(4, 9);
echo "addNumbers(4, 9): $result2\n";

$result3 = addNumbers(29, 1, 4, 56, 79);
echo "addNumbers(29, 1, 4, 56, 79): $result3\n";
