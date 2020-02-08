<?php
/**
 * Prints the received number of values, mod value, and array.
 *
 * @param $vector
 * @param $number
 * @param $mod
 */
function showVector($vector, $number, $mod)
{
    echo $number. " " . $mod . "\n";

    $size = sizeof($vector);
    foreach($vector as &$value) {
        echo $value . "\n";
    }

}

/**
 * Get a 1-dimensional array from a 2-dimensional array.
 *
 * @param $array
 * @param $i
 * @return mixed
 */
function getVector($array, $i)
{

    $size = sizeof($array[$i]);

    for($count = 0; $count < $size; $count++) {

        $vector[$count] = $array[$i][$count];

    }

    return $vector;
}

/**
 * Sort the received vector by with the value % $mod.
 * If mod value is equal between the array position then
 *      if both values are odd, get the max.
 *      if both values are pair, get the min.
 *      if one odd value and one pair value get the odd value.
 *
 * @param $vector
 * @param $mod
 * @return mixed
 */
function sorting($vector, $mod)
{

    $size = sizeof($vector);

    for($count = 0; $count < $size; $count++) {

        for($count2 = 0; $count2 < $size - 1; $count2++) {

            if(($vector[$count2] % $mod) > ($vector[$count2 + 1] % $mod)) {

                $temp = $vector[$count2];
                $vector[$count2] = $vector[$count2 + 1];
                $vector[$count2 + 1] = $temp;

            }elseif(($vector[$count2] % $mod) === ($vector[$count2 + 1] % $mod)){

                if(($vector[$count2] % 2 === 0 and $vector[$count2 + 1] % 2 !== 0)){

                    $temp = $vector[$count2];
                    $vector[$count2] = $vector[$count2 + 1];
                    $vector[$count2 + 1] = $temp;

                }elseif($vector[$count2] % 2 !== 0 and $vector[$count2 + 1] % 2 !== 0){

                    if($vector[$count2 + 1] > $vector[$count2]){

                        $temp = $vector[$count2];
                        $vector[$count2] = $vector[$count2 + 1];
                        $vector[$count2 + 1] = $temp;

                    }

                }elseif($vector[$count2] % 2 === 0 and $vector[$count2 + 1] % 2 === 0){
                    
                    if($vector[$count2 + 1] < $vector[$count2]){

                        $temp = $vector[$count2];
                        $vector[$count2] = $vector[$count2 + 1];
                        $vector[$count2 + 1] = $temp;

                    }

                }

            }

        }

    }

    return $vector;

}

$file = fopen("entrada.txt", "r");
$i = 0;

while(!feof($file))
{

    $line = fgets($file);
    preg_match_all('!\d+!', $line, $numbers);
    $number = (int)$numbers[0][0];
    $mod = (int)$numbers[0][1];

    if($number === 0 and $mod === 0) break;

    for($count = 0; $count < $number; $count++) {

        $line = (int)fgets($file);

        $array[$i][$count] = $line;
    }

    $vector = getVector($array, $i);

    $vector = sorting($vector, $mod);

    showVector($vector, $number, $mod);

    $i++;
    
}

echo "0 0\n";