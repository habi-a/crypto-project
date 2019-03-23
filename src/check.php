<?php

function checkSecretKey($line)
{
    $temp = 0;
    $reg = "/^[0-9,]*$/";

    $result = explode(",", $line);
    for ($i = 0; isset($result[$i]); $i++) {
        $value = intval($result[$i]);
        if ($value <= $temp || !ctype_digit($result[$i]))
            return (false);
        $temp += $value;
    }

    $result = preg_match($reg, $line);
    if ($result == 0)
        return (false);
    return (true);
}

function checkPublicKey($line)
{
    $reg = "/^[0-9,]*$/";

    $result = explode(",", $line);
    for ($i = 0; isset($result[$i]); $i++)
        if (!ctype_digit($result[$i]))
            return (false);

    $result = preg_match($reg, $line);
    if ($result == 0)
        return (false);
    return (true);
}

function checkPermutationKey($line)
{
    $reg = "/^[0-9,]*$/";

    $result = explode(",", $line);
    for ($i = 0; isset($result[$i]); $i++)
        if (!ctype_digit($result[$i]))
            return (false);

    $result = preg_match($reg, $line);
    if ($result == 0)
        return (false);
    return (true);
}

function checkCryptedMessage($line)
{
    $reg = "/^[0-9 ]*$/";

    $result = explode(" ", $line);
    for ($i = 0; isset($result[$i]); $i++)
        if (!ctype_digit($result[$i]))
            return (false);

    $result = preg_match($reg, $line);
    if ($result == 0)
        return (false);
    return (true);
}
