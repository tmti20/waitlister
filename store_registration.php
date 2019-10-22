<?php include ("header.php");?>
<?php
//session_set_cookie_params ( 0, "/~mj342/");
//session_start();
//?>

<?php
include ("DB/connectDB.php");

$storename = $_POST["storename"];
$city = $_POST[ "city" ];
$zip = $_POST[ "zip" ];


$sql_insert = "insert into wt_store (storename, city, zip) values ('$storename','$city','$zip')";

echo "<br> Congratulation! You have successfully register your store to Waitlister System.<br>";
echo "<br> $storename<br>";
echo "$city<br>";
echo "$zip<br>";

$t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement

?>

<?php include ("footer.php");?>