<?php

/**
 * Get all characters of the string and increments 3 on the ASCII value.
 *
 * @param $string
 *
 * @return mixed
 */
function firstStep($string)
{

    for($i = 0; $i < strlen($string); $i++){

        $char = $string[$i];

        if(ctype_alpha($char)){
            $charNumber = ord($char);

            $charNumber += 3;

            $charNumber %= 256;

            $string[$i] = chr($charNumber);
        }
        
    }
    
    return $string;

}

/**
 * Revert the string.
 *
 * @param $string
 *
 * @return string
 */
function secondStep($string)
{

    return strrev($string);

}

/**
 * Get half(truncated) of the string characters and decrement 1 on the ASCII value.
 *
 * @param $string
 *
 * @return mixed
 */
function thirdStep($string)
{

    $size = (int)((strlen($string))/2);

    for($i = $size; $i < strlen($string); $i++){

        $char = $string[$i];

        $charNumber = ord($char);

        $charNumber -= 1;

        $charNumber %= 256;

        $string[$i] = chr($charNumber);
    }
    
    return $string;

}

$file = fopen("entrada.txt", "r");

$number = (int)fgets($file);

for($count = 0; $count < $number; $count++){

    $string = fgets($file);
    $string = trim($string);

    $string = firstStep($string);

    $string = secondStep($string);

    $string = thirdStep($string);

    echo $string, "\n";
}