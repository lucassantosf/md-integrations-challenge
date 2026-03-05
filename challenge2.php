<?php
// Online PHP compiler to run PHP program online
// Print "Try programiz.pro" message
$transactions = [
    101, 50, // Subscription ID 101, Score +50 
    202, 10,
    101, -20,
    303, 100,
    202, 5,
    303, -10,
    101, 75
];

$temp = [];
for ($i = 0; $i < count($transactions); $i++) {
    if ($i % 2 == 0) {
        if (!isset($temp[$transactions[$i]])) {
            $temp[$transactions[$i]] = 0;
        }
    }
    else {
        $temp[$transactions[$i - 1]] += $transactions[$i];
    }
}

$highest_ = [];
$highest = 0;

foreach ($temp as $key => $value) {
    if ($value > $highest) {
        $highest = $value;
        $highest_["id"] = $key;
        $highest_["value"] = $value;
    }
}

echo "Final Balances: " . PHP_EOL;
var_dump($temp);

echo 'Winning Subscription ID: ' . $highest_["id"] . ' (with a score of ' . $highest_["value"] . ')';

?>