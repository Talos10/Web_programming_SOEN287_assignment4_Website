<?php
/**
 * Created by IntelliJ IDEA.
 * User: razva
 * Date: 2019-04-13
 * Time: 9:03 PM
 */
/*session_start();

if( !defined('FOO_EXECUTED') ){

    $_SESSION["failLogin"] = false;

    define('FOO_EXECUTED', TRUE);
}*/


/*$check = true;

if($check){
    $_SESSION["failLogin"] = false;
    $check = false;
}*/

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Question4</title>

    <script src="Question5.js" defer type="text/javascript"></script>

    <style>

        body{
            background-color: tan;
        }

        fieldset.purpleStyle {border-color: purple; background-color: mediumpurple}

        fieldset.greenStyle {border-color: darkgreen; background-color: moccasin}

        legend.purpleStyle {color: purple; font-size: large}

        legend.greenStyle {color: darkgreen}

        .plumStyle {color: plum}
        .limeStyle {color: lime}

        #expert {border-color: darkgreen; background-color: tan;}

    </style>
</head>

<body>

<table>

    <tr>
        <td ><a href="https://s-ec.bstatic.com/images/hotel/max1280x900/101/101430248.jpg"><img src="hotel.jpg" alt="image of a hotel" height="88" width="142"> </a></td>

        <td ><br/><h1>Hotel Reservation Form</h1><br/></td>
    </tr>
</table>

<?php

date_default_timezone_set('EST');
$datetime = new DateTime();
$date = $datetime->format('D F j H:i:s e Y');
echo $date;
?>