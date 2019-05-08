<?php
/**
 * Created by IntelliJ IDEA.
 * User: razva
 * Date: 2019-04-13
 * Time: 9:43 PM
 */

//$_SESSION["failLogin"] = true;

if(isset($_POST["return"]))
    $_SESSION["return"] = true;

else if(isset($_POST["login"])){
    unset($_SESSION["return"]);
    $username = $_POST["username"];
    $password = $_POST["password"];

    $failLogin = true;

    //A: Check for username format

    if($username != "" && !preg_match("/[^0-9A-Za-z]/", $username)){

        //Username fits format.

        //B: Check for password format.


        if($password != "" && !preg_match("/[^0-9A-Za-z]/", $password) && preg_match("/[A-Za-z]+?/", $password) && preg_match("/[0-9]+?/", $password) && preg_match("/.{6,}/", $password)){


            //Password format fits.

            //C: Check for if username is in the file.



                //If it is, then D: Check if password is in the file. If password is not the right one then invalid login. If it is the right one then log in.

                //If the username is not in the file, then create new account.


            $file = fopen("loginInfo.txt", "r");

            while(!feof($file)){
                $info = fgets($file);
                $info = explode(":", $info);

                /*print_r($info);

                echo $username."\n";
                echo $password;*/

                if($username == $info[0]){
                    //Username matches an entry



                    $pass = explode("\n", $info[1]);

                    /*echo "<p></p>";
                    echo "***".$password."***";
                    echo "<p></p>";
                    echo "***".$pass[0]."***";*/

                    if($password == $pass[0]){
                        //Password matches an entry so we log the user in


                        echo "<p>Logged in successfully!</p>";

                        $_SESSION["username"] = $username;
                        $_SESSION["password"] = $password;

                        break;
                    }

                    else{
                        echo "<p>Invalid login (wrong password, good user).</p>";
                        $failLogin = true;



                        $_SESSION["failLogin"] = $failLogin;

                        break;
                    }
                }

                /*if($failLogin){
                    $failLogin = false;
                    $_SESSION["failLogin"] = $failLogin;
                }*/


            }

            fclose($file);


            if(!$failLogin){
                //Create new account



                //$file = fopen("loginInfo.txt", "w");

                file_put_contents("loginInfo.txt", $username.":".$password."\n", FILE_APPEND);

                //fclose($file);

                unset($_SESSION["failLogin"]);

                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;

                echo "<p>New account was created!</p>";
            }


            //echo "Creating new account";
            //$file = fopen("loginInfo.txt", "w");
        }

        else{

            //Password does not fit format.

            $failLogin = true;

            $_SESSION["failLogin"] = $failLogin;

            echo "<p>Invalid login (password does not fit format).</p>";
        }

        $failLogin = false;
        $_SESSION["failLogin"] = $failLogin;

    }

    else{
        //Username does not fit format.

        $failLogin = true;

        $_SESSION["failLogin"] = $failLogin;

        echo "<p>Invalid login (username does not fit format).</p>";
    }


}



?>

<h2>Please enter your username and password:</h2>
  <form method="post">
      <label>Username:
          <input type="text" name="username" size="25"/></label>
      <br/><br />

      <label>Password:
          <input type="text"  name="password" size="25" /></label>
	  <br/><br />

	  <input type="reset" value="Reset" />
      <input type="submit" name="login" value="Login" />
      <input type="submit" name="return" value="Return to search"/>
  </form>