<?php
/**
 * Created by IntelliJ IDEA.
 * User: razva
 * Date: 2019-04-13
 * Time: 9:07 PM
 */

session_start();

if(isset($_POST["return"])){
    $_SESSION["failLogin"] = false;
    unset($_SESSION["return"]);
    include("head.php");
    include("search.php");
    include("footer.php");
    ?> <script>alert("Here #1!")</script><?php
}

if(!isset($_SESSION["failLogin"])){

    $_SESSION["failLogin"] = false;
    include("head.php");
    include("search.php");
    include("footer.php");
    ?> <script>alert("Here #2!")</script><?php
}

else if($_SESSION["failLogin"]){
    include("head.php");
    include("login.php");
    include("footer.php");
    ?> <script>alert("Here #3!")</script><?php
    //$_SESSION["failLogin"] = true;
}

else if(isset($_POST['goToLogin'])){
    include("head.php");
    include("login.php");
    include("footer.php");
    ?> <script>alert("Here #4!")</script><?php
    //$_SESSION["failLogin"] = true;
}

else if(isset($_POST['login'])){
    include("head.php");
    include("login.php");
    include("footer.php");
    ?> <script>alert("Here #5!")</script><?php
    //$_SESSION["failLogin"] = true;
}





