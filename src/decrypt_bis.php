<?php

function permutation($secret_key, $permutation)
{
    $secret_key2 = array_fill(0, count($secret_key) -1, null);

    for ($i = 0; $i < count($permutation); $i++)
        $secret_key2[$permutation[$i] - 1] = $secret_key[$i];
    return $secret_key2;    
}

function getBinaryEquivalent($key, $n)
{
    $binary_equivalent = array();
    
    for ($i = $n - 1; $i >= 0; $i--) {
        $bin = "";
        for ($j = 0; $j < $n; $j++)
            $bin .= ($i == $j) ? "1" :  "0";
        $binary_equivalent[$key[$n - $i - 1]] = $bin;
    }
    return ($binary_equivalent);
}

function addBinary($bin1, $bin2)
{
    $bin = "";
    for ($i = 0; $i < strlen($bin1); $i++) {
        if ($bin1[$i] == '1' || $bin2[$i] == '1')
            $bin .= '1';
        else
            $bin .= '0';
    }
    return ($bin);
}

function transformToBinary($decimal_array, $secret_key2, $binary_equivalent, $n)
{
    $array_binary = array();
    
    foreach ($decimal_array as $decimal) {
        $sum_binary = str_pad("", $n);
        $sum_array = findSum($secret_key2, $decimal);
        foreach ($sum_array as $number)
            $sum_binary = addBinary($sum_binary, $binary_equivalent[$number]);
        array_push($array_binary, $sum_binary);
    }
    return ($array_binary);
}
