<?php
session_start();
$barberid = $_GET["barberid"];
$storename = $_SESSION["storename2"];
$barbername  = $_GET["barbername"];
include ("header.php");
include("DB/connectDB.php");

$sql_insert = "select * from wt_order where barbername = '$barbername'";
$t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
$num = mysqli_num_rows ($t1);
if ($num > 0){
  echo "You have active order for this barber. Can't Delete. Try later";
  header( "Refresh:5; url='barber_registration_form.php'");
}else {
$s= "DELETE FROM wt_barber WHERE barberid = '$barberid'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
header("Location: barber_registration_form.php");

}
?>