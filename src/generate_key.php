<?php

function getSecretKey()
{
    echo("Veuillez entrer la clé secrete\n");
    while (true) {
        $line = trim(readline("clé secrete: "));
        if (!checkSecretKey($line))
            echo("La suite n'est pas au bon format !\n");
        else
            return (explode(",", $line));
    }
}

function getM($secret_key)
{
    echo("Veuillez entrer le premier entier m :\n");

    while (true) {
        $line = trim(readline("m : "));
        $line_int = intval($line);
        if ($line_int <= 0 || !ctype_digit($line) || $line_int <= array_sum($secret_key))
            echo "L'entier n'est pas au bon format.\n";
        else
            break;
    }
    return ($line_int);
}

function getE($m)
{
    echo("Veuillez entrer le deuxieme entier e:\n");

    while (true) {
        $line = trim(readline("e: "));
        $line_int = intval($line);
        if ($line_int <= 1 || !ctype_digit($line) || $line_int >= $m)
            echo("e n'est pas au bon format.\n");
        else if (my_pgcd($line_int, $m) != 1)
            echo "Le premier entier e et le second entier m ne sont pas premiers entre eux.\n";
        else
            break;
    }
    return ($line_int);
}

function getPermutation($intermediate_key, $public_key)
{
    $permutation = array();

    for ($i = 0; $i < count($intermediate_key); $i++)
        for ($j = 0; $j < count($public_key); $j++)
            if ($intermediate_key[$i] == $public_key[$j])
                array_push($permutation, $j + 1);
    return ($permutation);
}

function generatePublicKey() {
    $secret_key = getSecretKey();
    $intermediate_key = array();
    $public_key = array();
    $permutation = array();
    $m = getM($secret_key);
    $e = getE($m);
    
    foreach ($secret_key as $value)
        array_push($intermediate_key, my_modulo($value * $e, $m));

    $public_key = $intermediate_key;
    sort($public_key);
    $permutation = getPermutation($intermediate_key, $public_key);
    echo("\n\n---------------------------\n");
    echo("e: " . $e . ", m: " . $m . "\n");
    echo("Your secret key: ");
    my_print_r($secret_key);
    echo("Your public key S': ");
    my_print_r($public_key);
    echo("Your permutation: ");
    my_print_r($permutation);
    echo("---------------------------\n\n");
}
