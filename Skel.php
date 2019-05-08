<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question#1</title>
</head>
<body>
<?php include 'question#1.php';?>
<h3>Result from findSummation function with 5:</h3>
<p><?php findSummation(5);?></p><br/>

<h3>Result from findSummation function with -4:</h3>
<p><?php findSummation(-4);?></p><br/>

<h3>Result from findSummation function with asd123:</h3>
<p><?php findSummation("asd123");?></p><br/>

<h3>Result from uppercaseFirstandLastSorted function with string "FOr eAch wORd in THE input StriNG":</h3>
<p><?php uppercaseFirstandLastSorted("FOr eAch wORd in THE input StriNG");?></p><br/>

<h3>Result from findAverage_and_Median function with array containing numbers [1,2,3,4,5]:</h3>
<p><?php findAverage_and_Median([1,2,3,4,5]);?></p><br/>

<h3>Result from findAverage_and_Median function with array containing numbers [1,2,4,5,6,21]:</h3>
<p><?php findAverage_and_Median([1,2,4,5,6,21]);?></p><br/>

<h3>Result from find4Digits function with the following string "1 2 3 4 12 34 3456 45678 1222 ":</h3>
<p><?php find4Digits("1 2 3 4 12 34 3456 45678 1222 ");?></p><br/>

<h3>Result from find4Digits function with the following string "1 2 3 4 12 34 000 asdc vx ":</h3>
<p><?php find4Digits("1 2 3 4 12 34 000 asdc vx ");?></p><br/>
</body>
</html>