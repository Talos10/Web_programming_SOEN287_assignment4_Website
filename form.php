<?php
/**
 * Created by IntelliJ IDEA.
 * User: razva
 * Date: 2019-04-13
 * Time: 5:58 PM
 */

if(isset($_GET['submit'])){
    $name = $_GET['family_name'];
    $phone = $_GET['phone'];

    $nameOk = preg_match('/[^A-Za-z]/', $name);
    $phoneOk = preg_match('/[^0-9()-]/', $phone);

    if($nameOk || $phoneOk){
        echo "<h3>The form was not filled successfully!</h3>";
        if($nameOk)
            echo "<p>The family is not in the right format (i.e. one word, capital letter, less than 30 chars).</p>";
        if($phoneOk)
            echo "<p>The phone number is not in the right format (i.e. (ddd)-ddd-dddd)).</p>";
    }

    else{
        $nameOk = preg_match('/^[A-Z][a-z]+/', $name);
        $phoneOk = preg_match('/^\([0-9]{3}\)-[0-9]{3}-[0-9]{4}/', $phone);

        if($nameOk && $phoneOk)
            echo "<h3>The form was filled successfully!</h3>";
        else{
            echo "<h3>The form was not filled successfully!</h3>";
            if(!$nameOk)
                echo "<p>The family is not in the right format (i.e. one word, capital letter, less than 30 chars).</p>";
            if(!$phoneOk)
                echo "<p>The phone number is not in the right format (i.e. (ddd)-ddd-dddd)).</p>";
        }
    }
}
?>

<html lang="en">
<head>
  <meta charset="utf-8"/>
  <title>A form</title>
</head>
<body>
  <h2>Please enter your family name and your phone number:</h2>
  <form method="get">
      <label>Family Name (max 30 char):
          <input name="family_name" size="25" maxlength="30"/></label>
      <br/><br />

      <label>Phone number (format:(ddd)-ddd-dddd):
          <input type="text"  name="phone" size="25" /></label>
	  <br/><br />

	  <input type="reset" value="Clear Form" />
      <input type="submit" name="submit" value="Send" />
  </form>
</body>
</html>