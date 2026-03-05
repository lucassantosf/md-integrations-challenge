<?php
// Online PHP compiler to run PHP program online
$adjustmentRate = 13;
$baseNumbers = [100, 200, 300];

function applyTax(array $data, callable $callback)
{
    return array_map($callback, $data);
}

$rule = function ($number) use ($adjustmentRate) {

    $isPrime = true;
    if ($adjustmentRate < 2) {
        $isPrime = false;
    }
    else {
        for ($i = 2; $i <= sqrt($adjustmentRate); $i++) {
            if ($adjustmentRate % $i == 0) {
                $isPrime = false;
                break;
            }
        }
    }
    if ($isPrime)
        return $number + $adjustmentRate;
    else
        return $number - $adjustmentRate;
};

$result = applyTax($baseNumbers, $rule);
print_r($result);

?>