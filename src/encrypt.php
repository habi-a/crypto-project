<?php

function getPublicKey()
{
    echo("Veuillez entrer la clé publique S'\n");

    while (true) {
        $line = trim(readline("S' : "));
        if (!checkPublicKey($line))
            echo("La suite n'est pas au bon format !\n");
        else
            break;
    }    
    $result = explode(",", $line);
    return ($result);
}

function getN($message)
{
    echo("Veuillez entrer l'entier n.\n");

    while (true) {
        $line = trim(readline("n : "));
        $line_int = intval($line);
        if (!ctype_digit($line))
            echo("Veuillez entrer un nombre.\n");
        else if ($line_int < 2 || $line_int > strlen($message))
            echo("Veuillez entrer un nombre supérieur à 2 et inférieur à ${strlen($message)}.\n");
        else
            break;
    }
    return ($line_int);    
}

function completeArray(&$array, $n)
{
    for ($i = 0; $i < count($array); $i++)
        if ($i == count($array) - 1)
            $array[$i] = str_pad($array[$i],  $n, "0");
}

function getCryptedMessage($array_binary, $public_key, $n)
{
    $crypted_message = array();
    foreach ($array_binary as $letter) {
        $sum = 0;
        for ($i = 0; $i < strlen($letter); $i++)
            if ($letter[$i] == '1')
                $sum += $public_key[$n - 1 - $i];
        array_push($crypted_message, $sum);
    }
    $crypted_message = implode(' ', $crypted_message);
    return $crypted_message;
}

function encrypt()
{
    $public_key = getPublicKey();
    echo("Veuillez entrer la chaine à chiffrer\n");
    $message = trim(readline("Message: "));
    $n = getN($message);
    $message_binary = textToBinary($message);
    $array_binary = str_split($message_binary, $n);
    completeArray($array_binary, $n);
    $crypted_message = getCryptedMessage($array_binary, $public_key, $n);

    echo("\n---------------------------\n");
    echo("n: " . $n . "\n");
    echo("Your crypted message: " . $crypted_message . "\n");
    echo("---------------------------\n\n");
}
