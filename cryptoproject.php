#!/usr/bin/php
<?php

foreach (glob("src/*.php") as $filefunc)
    include_once $filefunc;

function printTitle()
{
    echo("CRYPTOPROEJCT\n\n");
}

function printChoices() {
    echo("Faites votre choix :\n");
    echo("1 - Génération de clé publique.\n");
    echo("2 - Chiffrement d'un message.\n");
    echo("3 - Déchiffrement d'un message\n");
    echo("4 - Chiffrement d'un message avec le chiffre de CESAR\n");
    echo("5 - Déchiffrement d'un message avec le chiffre de CESAR\n");
    echo("6 - Sortir du programme\n\n");
}

function main() {
    printTitle();

    while (true) {
        printChoices();
        $entry = readline("choix: ");

        if ($entry == "1")
            generatePublicKey();
        else if ($entry == "2")
            encrypt();
        else if ($entry == "3")
            decrypt();
        else if ($entry == "4")
            encrypt_cesar();
        else if ($entry == "5")
            decrypt_cesar();
        else if ($entry == "6")
            break;
    }
}

main();