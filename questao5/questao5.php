<?php
$file = fopen("entrada.txt", "r");

while(!feof($file)){

    $number = (int)fgets($file);

    if($number === 0) break; // If last line, ends.

    $array = array();

    /* Getting a row of inputs */
    for($count = 0; $count < $number; $count++){

        $line = fgets($file);

        preg_match_all('!\d+!', $line, $numbers);

        for($count2 = 0; $count2 < 4; $count2++){

            $array[$count][$count2] = $numbers[0][$count2];

        }

    }

    $totalDays = 0;
    $totalKWh = 0;

    /* Calculates the difference between the days, if === 1 then it's a consecutive day and increases the $totalDays variable. */
    for($count = 0; $count < $number - 1; $count++){

        $day = $count;
        $nextDay = $day + 1;

        $date1 = $array[$day][2] . "-" . $array[$day][1] . "-" . $array[$day][0];
        $date2 = $array[$nextDay][2] . "-" . $array[$nextDay][1] . "-" . $array[$nextDay][0];

        $date1 = date_create($date1);
        $date2 = date_create($date2);
        $interval = date_diff($date1, $date2);

        $diff = (int)$interval->format('%R%a'); // Get difference between dates

        if($diff === 1){

            $totalDays += 1;
            $totalKWh += $array[$nextDay][3] - $array[$day][3];

        }

    }

    echo $totalDays . " " . $totalKWh . "\n";

}