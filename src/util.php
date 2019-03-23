<?php

function my_pgcd($a, $b)
{
    while ($a != $b) {
        if ($a > $b)
            $a = $a - $b;
        else if ($a < $b)
            $b = $b - $a;
    }
    return ($a);
}

function my_print_r($array)
{
    echo('"');
    if (count($array) > 0) {
        echo($array[0]);
        for ($i = 1; $i < count($array); $i++)
            echo(", " . $array[$i]);
    }
    echo("\"\n");
}

function textToBinary($text)
{
    $mybitseq = "";
    
    for($i = 0; $i < strlen($text); $i++) {
        $bin = decbin(ord($text[$i]));
        $mybitseq .= substr("00000000", 0, 8 - strlen($bin)) . $bin;
    }
    return ($mybitseq);
}

function binaryToText($bin) {
    $text = array();
    
    for ($i = 0; $i < count($bin); $i++)
        array_push($text, chr(bindec($bin[$i])));
    return (implode($text));
}

function findSum($numbers, $target, $index = 0)
{
    for ($i = $index; $i < count($numbers); $i++) {
            $remainder = $target - $numbers[$i];
            if ($remainder < 0)
                continue;
            else if ($remainder == 0)
                return (array($numbers[$i]));
            else {
                $s = findSum($numbers, $remainder, $i + 1);
                if (count($s) == 0)
                    continue;
                array_unshift($s, $numbers[$i]);
                return $s;
            }
    }
    return (array());
}
