<?php

function getPermutationKey()
{
    echo("Veuillez entrer la permutation P\n");

    while (true) {
        $line = trim(readline("P: "));
        if (!checkPermutationKey($line))
            echo("La suite n'est pas au bon format !\n");
        else
            break;
    }
    $result = explode(",", $line);
    return ($result);
}

function getMessage()
{
    echo("Veuillez entrer la chaine à dechiffrer\n");

    while (true) {
        $line = trim(readline("message: "));
        if (!checkCryptedMessage($line))
            echo("La chaine n'est pas au bon format !\n");
        else
            break;
    }
    $result = explode(" ", $line);
    return ($result);
}

function getNWithoutSizeCheck()
{
    echo("Veuillez entrer l'entier n.\n");

    while (true) {
        $line = trim(readline("n : "));
        $line_int = intval($line);
        if (!ctype_digit($line))
            echo("Veuillez entrer un nombre.\n");
        else if ($line_int < 2)
            echo("Veuillez entrer un nombre supérieur à 2\n");
        else
            break;
    }
    return ($line_int);
}

function cryptedToDecimal($message, $d, $m)
{
    $decimal_array = array();

    foreach ($message as $value)
        array_push($decimal_array, my_modulo($value * $d, $m));
    return ($decimal_array);
}

function permutation($secret_key, $permutation)
{
    $secret_key2 = array_fill(0, count($secret_key) -1, null);

    for ($i = 0; $i < count($permutation); $i++)
        $secret_key2[$permutation[$i] - 1] = $secret_key[$i];
    return ($secret_key2);    
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

function decrypt()
{
    $secret_key = getSecretKey();
    $m = getM($secret_key);
    $e = getE($m);
    $permutation = getPermutationKey();
    $message = getMessage();
    $n = getNWithoutSizeCheck();
    $d = my_inv_modulo($e, $m);
    $decimal_array = cryptedToDecimal($message, $d, $m);
    $secret_key2 = permutation($secret_key, $permutation);
    $binary_equivalent = getBinaryEquivalent($secret_key2, $n);
    $array_binary = transformToBinary($decimal_array, $secret_key2, $binary_equivalent, $n);
    $string_binary = implode("", $array_binary);
    $final_binary = str_split($string_binary, 8);
    if (strlen(end($final_binary)) != 8)
        array_pop($final_binary);
    $final_message = binaryToText($final_binary);
    echo("\n---------------------------\n");
    echo("The message: " . $final_message . "\n");
    echo("---------------------------\n\n");
}
