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

    $exitProgram = false;
    while (!$exitProgram) {
        printChoices();
        $entry = readline("choix: ");

        switch ($entry) {
        case "1":
            generatePublicKey();
            break;
        case "2":
            encrypt();
            break;
        case "3":
            decrypt();
            break;
        case "4":
            encrypt_cesar();
            break;
        case "5":
            decrypt_cesar();
            break;
        case "6":
            $exitProgram = true;
            break;
        default:
            break;
        }
    }
}

main();