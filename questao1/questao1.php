<?php

/**
 * Checks if is a huluculu festival year and print the message.
 *
 * @param $year
 *
 * @return void
 */
function huluculuYear($year)
{

    if($year % 15 === 0){

        echo "This is huluculu festival year.\n";

    }

}

/**
 * Checks if is a bulukulu festival year and print the message.
 *
 * @param $year
 *
 * @return void
 */
function bulukuluYear($year)
{

    if($year % 55 === 0){

        echo "This is bulukulu festival year.\n";

    }

}

/**
 * Checks if is a huluculu festival year and print the message
 * else it's a ordinary year and print the message.
 *
 * @param $year
 *
 * @return void
 */
function ordinaryOrHuluculuYear($year)
{

    if($year % 15 === 0){

        echo "This is huluculu festival year.\n";

    }else{

       echo "This is an ordinary year.\n";

    }

}

$file = fopen("entrada.txt", "r");

while(!feof($file)){

    $year = (float)fgets($file);

    if($year % 4 === 0){

        if($year % 400 === 0){

            echo "This is leap year.\n";

            huluculuYear($year);

            bulukuluYear($year);

        }elseif($year % 100 !== 0){
            echo "This is leap year.\n";

            huluculuYear($year);

            bulukuluYear($year);

        }else{

            ordinaryOrHuluculuYear($year);
            
        }

    }else{

        ordinaryOrHuluculuYear($year);

    }

    echo "\n";
}