
<?php
session_start();
include("DB/connectDB.php");

$s = "select * from queue " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//MENU
echo "<select  name=\"queue\">";
    //OPTIONS
    while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
//    $merchantid = $r["merchant"];
    $queueid = $r["queueid"];

    echo "<option value = \"$queueid\">";
//        echo  "$merchantid || ";
        echo  "$queueid ";
        echo "</option>";
    echo "<br>";
    }

    ////End Option Wrapper
    echo "</select>";


?>


<!----------------------- Footer HTML code here ----------------------->

