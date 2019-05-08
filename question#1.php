<?php
/**
 * Created by IntelliJ IDEA.
 * User: razva
 * Date: 2019-04-10
 * Time: 12:04 PM
 */

function findSummation($N){
    $var = 1;

    if(is_numeric($N)){
        if($N > 0){
            for($i = 2; $i <= $N; $i++){
                $var += $i;
            }

            echo $var;
            return $var;
        }

        else{
            echo "false";
            return false;
        }

    }

    else{
        echo "false";
        return false;
    }
}

function uppercaseFirstandLastSorted($string){
    $result = "";
    $modString = explode(" ", strtolower($string));

    for($i = 0; $i < sizeof($modString); $i++)
        $modString[$i] = strrev(ucwords(strrev(ucwords($modString[$i]))));

    sort($modString, 2);

    $result = implode(" ", $modString);

    echo $result;
    return $result;
}

function findAverage_and_Median($array){
    $sizePairOrUnpair = sizeof($array) % 2;
    $avg = 0;
    $median = 0;
    $results = [];

    if($sizePairOrUnpair > 0)
        $median = $array[(int)((sizeof($array))/2)];
    else
        $median = ($array[(sizeof($array)/2)] + $array[(sizeof($array)/2) - 1])/2;

    for($i = 0; $i < sizeof($array); $i++)
        $avg += $array[$i];

    $avg /= sizeof($array);

    $results = [$avg, $median];

    echo "Average: " . $avg;
    echo "<br/> Median: " . $median;

    return $results;
}

function find4Digits($string){

    $success = preg_match('/[0-9]{4}/', $string,$matches);

    if($success)
        echo "First 4-digit number found: " . $matches[0];
    else
        echo "No match was found.";

    return $success;
}
