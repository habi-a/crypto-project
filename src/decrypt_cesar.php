<?php

function getCryptedMessageCesar()
{
    echo("Veuillez entrer le message à déchiffrer, le message doit être composé uniquement de lettres en capitale et d'espace\n");

    while (true) {
        $line = trim(readline("message: "));

        if (preg_match('#^[A-Z ]+$#', $line) == 0)
            echo("Mauvais format\n");
        else
            break;
    }
    return $line;
}

function unshiftMessage($crypted_message, $key, $alphabet)
{
    $message = "";
    
    for ($i = 0; $i < strlen($crypted_message); $i++) {
        if ($crypted_message[$i] == " ")
            $message .= $crypted_message[$i];
        else
            $message .= $alphabet[my_modulo(strrpos($alphabet, $crypted_message[$i]) - $key, 26)];
    }
    return $message;
}

function decrypt_cesar()
{
    $crypted_message = getCryptedMessageCesar();
    $key = getKey();
    $alphabet = implode("", range('A', 'Z'));
    $message = unshiftMessage($crypted_message, $key, $alphabet);

    echo("\n---------------------------\n");
    echo("The message: " . $message . "\n");
    echo("---------------------------\n\n");
}
