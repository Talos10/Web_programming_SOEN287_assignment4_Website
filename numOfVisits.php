<?php
/**
 * Created by IntelliJ IDEA.
 * User: razva
 * Date: 2019-04-13
 * Time: 3:49 PM
 */

if(isset($_COOKIE["numOfVisits"])){

    $results = explode(" ", $_COOKIE["numOfVisits"]);

    $oldDate = "";

    for($i = 1; $i < sizeof($results); $i++)
        $oldDate .= $results[$i] . " ";

    $count = 1 + $results[0];

    echo "<h3>Hello, this is the " . $count . " time that you are visiting my webpage.</h3>";

    echo "<h4>Last time you visited my webpage on: " . $oldDate . "</h4>";

    date_default_timezone_set('EST');
    $datetime = new DateTime();
    $date = $datetime->format('D F j H:i:s e Y');

    $info = $count . " " . $date;

    $length = time() + 3600 * 24 * 365;
    setcookie("numOfVisits", $info, $length);
}

else {

    echo "<h3>Welcome to my webpage! It is the first time that you are here.</h3>";

    $count = 1;

    date_default_timezone_set('EST');
    $datetime = new DateTime();
    $date = $datetime->format('D F j H:i:s e Y');

    $info = $count . " " . $date;

    $length = time() + 3600 * 24 * 365;
    setcookie("numOfVisits", $info, $length);
}