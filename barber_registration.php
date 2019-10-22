<?php include ("header.php");?>

<?php
//session_set_cookie_params ( 0, "/~mj342/");
//session_start();
//?>

<?php
include ("DB/connectDB.php");

$barbername = filter_input(INPUT_POST, 'barbername', FILTER_SANITIZE_STRING);
$storename = filter_input(INPUT_POST, 'storename', FILTER_SANITIZE_STRING);
//$zip = $_POST[ "zip" ];


$sql_insert = "insert into wt_barber (storename, barbername) values ('$storename','$barbername')";

echo "<br> Congratulation! You have successfully register your Barber.<br>";
echo "<br> $storename<br>";
echo "$barbername<br>";
//echo "$zip<br>";

$t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement

?>
    <br><br>

    <div class="container-login100-form-btn">
        <br><a class="login100-form-btn" href="barber_registration_form.php" role="button">Add Another Barber</a><br><br>
        <a class="login100-form-btn" href="Dash/dashboard.html" role="button">Back Dashboard</a><br>
    </div>

<?php include ("footer.php");?>