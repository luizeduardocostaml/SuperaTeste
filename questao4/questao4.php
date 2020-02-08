<?php

/**
 * This algorithm uses a Turing machine logic.
 * This code gets a "(" and marks as "x" and search for a ")".
 * If don't find a ")" or find an extra "(" or ")" the sentence is invalid.
 */


$file = fopen("entrada.txt", "r");

while(!feof($file)){

    $line = fgets($file);
    $valid = true;
    
    $size = strlen($line);

    for($count = 0; $count < $size; $count++){

        $char = $line[$count];

        if($char === '('){

            if($count === $size-1) $valid = false;
            $line[$count] = "x";

            for($count2 = $count + 1; $count2 < $size; $count2++){

                $char2 = $line[$count2];

                if($char2 === ')'){

                    $line[$count2] = "x";
                    break;

                }

                if($count2 === $size-1) $valid = false;

            }

        }
        
        if(($char === ')' and $count === $size - 1) or $char === ')'){

            $valid = false;

        }

    }

    if($valid) echo "correct\n";
    else echo "incorrect\n";

}