<?php
session_start();
$orderid = $_GET["orderid"];
//$storename = $_GET["storename"];
$barbername  = $_GET["barbername"];
$position  = $_GET["position2"];
$storename = $_SESSION["storename2"] ;
//$username = $_SESSION["username"];

include("DB/connectDB.php");
include ("header.php");
$s= "DELETE FROM wt_order WHERE orderid = '$orderid'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
echo "Order Number:<b>$orderid</b> deleted <br> ";
$s1 = "UPDATE wt_order SET position = position - 1 WHERE storename = '$storename' and barbername = '$barbername' and position > $position ";
($t1 = mysqli_query($db, $s1)) or die(mysqli_error($db));


if ($position == 1){
  $s2= "SELECT email FROM wt_registration r,wt_order o WHERE r.username = o.customername
and o.storename = '$storename'
and o.barbername = '$barbername'
and o.position = 2 ";
($t2 = mysqli_query($db, $s2)) or die(mysqli_error($db));
$r2 = mysqli_fetch_array($t2, MYSQLI_ASSOC);
$email = $r2["email"];
$headers[] = 'Content-type: text/html; charset=iso-8859-1'; // Header for plain text to email
$to = "$email";
$subject = " You Next - Waitlister " ;
$message = "Hurry up ! We will serve you Next. Only One customer ahead of you. 
<br><b> Store:</b> $storename
<br> <b>Barber Name :</b> $barbername 
<br><b> Thanks for Using Waitlister App</b>";
mail($to, $subject, $message,implode("\r\n", $headers)); // send mailer function
echo "<br> Email Sent to Next client";
}
header( "Refresh:3; url='Dash/dashboard.php'");


?>