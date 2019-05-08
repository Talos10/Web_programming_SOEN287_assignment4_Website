<?php

if(isset($_POST["search"]) && $_POST["search"]){
    $file = fopen("hotelInfo.txt", "r");

    if(isset($_POST["NbfOfRooms"]) && isset($_POST["prefLoc"]) && isset($_POST["priceRange"]) && isset($_POST["spcFac"])){
        $NbfOfRooms = $_POST["NbfOfRooms"];
        $prefLoc = $_POST["prefLoc"];
        //$prefLoc = implode(" ",$_POST["prefLoc"]);
        $priceRange = explode("-",$_POST["priceRange"]);
        $spcFac = $_POST["spcFac"];





        $nbrOfResults = 0;

        $results = [""];

        /*echo "<p></p>";
        echo $NbfOfRooms;
        echo "<p></p>";
        print_r($prefLoc);
        echo "<p></p>";
        print_r($priceRange);
        echo "<p></p>";
        print_r($spcFac);*/

        if(isset($_SESSION["username"]) && isset($_SESSION["username"]))
            $loggedIn = true;
        else
            $loggedIn = false;

        while(!feof($file)){

            $locCheck = false;
            $facCheck = false;

            $info = fgets($file);
            $info = explode(",", $info);

            $locs = explode(" ", $info[4]);

            for($i = 0; $i < sizeof($prefLoc); $i++){
                if($prefLoc[$i] == $info[1]){
                    /*echo "<p></p>";
                    print_r($info);

                    echo "<p></p>";
                    echo $prefLoc[$i];

                    echo "<p></p>";
                    echo $info[1];

                    echo "<p></p>";
                    echo "WE'RE IN!";*/

                    $locCheck = true;
                }

            }

            /*echo "<p></p>";
            print_r($locs);*/

            for($i = 0; $i < sizeof($spcFac); $i++){
                for($j = 0; $j < sizeof($locs); $j++){
                    if($spcFac[$i] == $info[4]){
                        $facCheck = true;

                        /*echo "<p></p>";
                        print_r($info);

                        echo "<p></p>";
                        echo $spcFac[$i];

                        echo "<p></p>";
                        echo $info[4];

                        echo "<p></p>";
                        echo "WE'RE IN!";*/
                    }
                }

            }

            /*echo "<p></p>";
            print_r($info);

            echo "<p></p>";
            echo $prefLoc;

            echo "<p></p>";
            echo $info[1];*/

            /*if(strpos($prefLoc,"Downtown") != false ||strpos($prefLoc,$info[1]) != false){
                echo "<h3>TRUE!</h3>";
                echo "<p></p>";
                echo $prefLoc;
                echo "<p></p>";
                echo $info[1];
            }*/


            if($locCheck && $NbfOfRooms <= $info[3] && $info[5] <= $priceRange[1] && $info[5] >= $priceRange[0] && $facCheck ){

                if($loggedIn){

                    $results[$nbrOfResults] .= "#Hotel name: " . $info[0] . ", Area: " . $info[1] . ", Address: " . $info[2] . ", Price per night: " . $info[5] . "$";


                    /*echo "<h3>Search results:</h3>";
                    echo "<h4>-Hotel Name:</h4>";
                    echo "<h4>-Name:</h4>";
                    echo "<h4>-Name:</h4>";
                    echo "<h4>-Name:</h4>";
                    echo "<h4>-Name:</h4>";*/
                }

                else{
                    $results[$nbrOfResults] .= "#Area: " . $info[1] . ". Please login for additional information!";
                }
                //echo "<h3>Match found!</h3>";

                $nbrOfResults++;

            }

        }

        echo "<h3>Here are the search results:</h3>";


        for($i = 0; $i < sizeof($results); $i++){
            echo "<h4></h4>";
            echo $results[$i];
        }


    }

    else{
        echo "<h3>Please complete any missing field before searching!</h3>";
    }


}

//Hotel name, area, street address and price per
//night.

//only the area
//information without the name and street address, and there should be a
//button “login to show the address” besides each result item.

//hotelInfo.txt

//store the information about
//location, address, number of available rooms, special facilities and price per
//night.

?>

    <form method="post">

        <?php if(isset($_SESSION["username"]) && isset($_SESSION["username"])){?>

        <h3>Welcome <?php echo $_SESSION["username"]?>!</h3>

        <?php }else echo "<h3>Welcome guest!</h3>"?>

        <input type="submit" name="goToLogin" value="Login" style="margin-left: 630px;">

        <fieldset class="purpleStyle">
            <legend class="purpleStyle">Reservation Information</legend>

            <label class="plumStyle"><strong>Number of rooms (max 5 people per room):</strong></label>
            <input type="number" name = "NbfOfRooms"/>

            <br/><br/>

            <label class="plumStyle"><strong>Smoker?</strong></label>
            <label><input type="radio" name="smokerAns" value="yes"/>Yes</label>
            <label><input type="radio" name="smokerAns" value="no" />No</label>

            <br/><br/>

            <label class="plumStyle"><strong>Check-in date (YYYY/MM/DD):</strong></label>
            <input type="date" name="Check-in date"/>

            <br/><br/>

            <label class="plumStyle"><strong>Check-out date (YYYY/MM/DD):</strong></label>
            <input type="date" name="Check-out date"/>
        </fieldset>

        <br/>

        <fieldset class="greenStyle">
            <legend class="greenStyle">Room Specifications</legend>

            <ul>
                <li>
                    <label class="limeStyle"><strong>Number of single/double beds:</strong></label>
                    <br/>

                    <input type="checkbox" name="nbr s/d beds" value="1/0"/>
                    <label>1/0</label>
                    
                    <input type="checkbox" name="nbr s/d beds" value="0/1"/>
                    <label>0/1</label>
                    
                    <input type="checkbox" name="nbr s/d beds" value="1/1"/>
                    <label>1/1</label>
                    
                    <input type="checkbox" name="nbr s/d beds" value="2/0"/>
                    <label>2/0</label>
                    
                    <input type="checkbox" name="nbr s/d beds" value="0/2"/>
                    <label>0/2</label>
                    
                    <input type="checkbox" name="nbr s/d beds" value="2/1"/>
                    <label>2/1</label>
                    
                    <input type="checkbox" name="nbr s/d beds" value="1/2"/>
                    <label>1/2</label>

                    <br/><br/>
                </li>

                <li>
                    <label class="limeStyle"><strong>Do you have preferred locations for the hotel?</strong></label>
                    <br/>

                    <input type="checkbox" name="prefLoc[]" value="Downtown"/>
                    <label>Downtown</label>
                    
                    <input type="checkbox" name="prefLoc[]" value="Montreal East"/>
                    <label>Montreal East</label>
                   
                    <input type="checkbox" name="prefLoc[]" value="Montreal West"/>
                    <label>Montreal West</label>
                    
                    <input type="checkbox" name="prefLoc[]" value="Near the airport"/>
                    <label>Near the airport</label>
                   
                    <input type="checkbox" name="prefLoc[]" value="Old Port"/>
                    <label>Old Port</label>
                    
                    <input type="checkbox" name="prefLoc[]" value="No preference"/>
                    <label>No preference</label>

                    <br/><br/>
                </li>

                <li>
                    <label class="limeStyle"><strong>Price range (price per night):</strong></label>

                    <br/>

                        <select name = "priceRange" id="price">
                            <option value="200-300">&lt;$200 to 300$</option>
                            <option value="100-200">&lt;$100 to 200$</option>
                            <option value="50-100">&lt;$50 to $100</option>
                            <option value="0-50">&lt;$50</option>
                            <option value="0-40">&lt;$40</option>
                            <option value="noPriceLimit">no price limit</option>
                        </select>

                    <br/><br/>
                </li>

                <li>
                    <label class="limeStyle"><strong>Number of private parking spots required:</strong></label>
                    <br/>

                    <input type="radio" name="prkSpots" value="0"/>
                    <label>0</label>
                    <br/>

                    <input type="radio" name="prkSpots" value="1"/>
                    <label>1</label>
                    <br/>

                    <input type="radio" name="prkSpots" value="2"/>
                    <label>2</label>
                    <br/>

                    <input type="radio" name="prkSpots" value="3"/>
                    <label>3</label>
                    <br/>

                    <input type="radio" name="prkSpots" value="4"/>
                    <label>4</label>
                    <br/><br/>

                </li>

                <li>
                    <label class="limeStyle"><strong>Special facilities required:</strong></label>
                    <br/>

                    <input type="checkbox" name="spcFac[]" value="Minibar"/>
                    <label>Minibar</label>

                    <input type="checkbox" name="spcFac[]" value="Balcony"/>
                    <label>Balcony</label>

                    <input type="checkbox" name="spcFac[]" value="Pool"/>
                    <label>Pool</label>

                    <input type="checkbox" name="spcFac[]" value="Water front"/>
                    <label>Water front</label>

                    <input type="checkbox" name="spcFac[]" value="Garden front"/>
                    <label>Garden front</label>

                </li>

            </ul>

        </fieldset>

        <br/><br/>

        <fieldset class="greenStyle" id="expert" style="position: relative; visibility: hidden">
            <legend class="greenStyle">Expert Suggestion</legend>
            <ul>
                <li>It is very difficult to find a hotel room in this price at Downtown.</li>
            </ul>
        </fieldset>

        <p>Let's see what we can find...</p>

        <input type="submit" name="search" value="Search" onclick="suggestion()"/>

        <input type="reset" name="reset" value="Start over"/>
    </form>
<!--

</body>

</html>-->
