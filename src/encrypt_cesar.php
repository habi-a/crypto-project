<?php

function getMessageCesar()
{
    echo("Veuillez entrer le message à chiffrer, le message doit être composé uniquement de lettres en capitale et d'espace\n");

    while (true) {
        $line = trim(readline("message: "));

        if (preg_match('#^[A-Z ]+$#', $line) == 0)
            echo("Mauvais format\n");
        else
            break;
    }
    return $line;
}

function getKey()
{
    echo("Veuillez entrer l'entier k, ce nombre doit être superieur à 0\n");

    while (true) {
        $line = trim(readline("k : "));
        $line_int = intval($line);
        if (!ctype_digit($line))
            echo("Veuillez entrer un nombre.\n");
        else if ($line_int <= 0)
            echo("Veuillez entrer un nombre supérieur à 0\n");
        else
            break;
    }
    return ($line_int);
}

function shiftMessage($message, $key, $alphabet)
{
    $crypted_message = "";
    
    for ($i = 0; $i < strlen($message); $i++) {
        if ($message[$i] == " ")
            $crypted_message .= $message[$i];
        else
            $crypted_message .= $alphabet[my_modulo(strrpos($alphabet, $message[$i]) + $key, 26)];
    }
    return $crypted_message;
}

function encrypt_cesar()
{
    $message = getMessageCesar();
    $key = getKey();
    $alphabet = implode("", range('A', 'Z'));
    $crypted_message = shiftMessage($message, $key, $alphabet);

    echo("\n---------------------------\n");
    echo("Key: " . $key . "\n");
    echo("Your crypted message: " . $crypted_message . "\n");
    echo("---------------------------\n\n");
}
