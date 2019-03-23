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
