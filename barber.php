<?php
include ( "connectDB.php") ;
include ("header.php");
//MENU.PHP
$store = "Up & Up";
$barbername = "Sean";
$s = "select * from wt_barber where storename = '$store' " ;
$q = "select queuenumber from wt_queue where barbername = '$barbername'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
($t2 = mysqli_query($db, $q)) or die(mysqli_error($db));

$star = "";
//MENU
echo "<select id='textarea'  name=\"store\">";
//OPTIONS
while (($r = mysqli_fetch_array($t,MYSQLI_ASSOC)) || ($o = mysqli_fetch_array($t2,MYSQLI_ASSOC)) ) {
    $barber = $r["barbername"];
    $rating = $r["rating"];
    $queuenumber = $o["queuenumber"];
    include ("rating.php");
    echo "<option value = \"$barber\">";
    echo  "$barber | Rating: $star <br>";
    //echo  "<br>| Queue : $queuenumber";
    echo "</option>";
}

//End Option Wrapper
echo "</select>";
//End Menu Wrapper
?>