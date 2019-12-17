<?php
session_start();
if ( ! $_SESSION["authenticated"])
{
	header("Location: waitlister.php");	
}

include ("header.php");
include ("DB/connectDB.php");
$barbername = filter_input(INPUT_POST, 'barbername', FILTER_SANITIZE_STRING);
$_SESSION["barbername"] = $barbername;
$storename = $_SESSION["storename2"];

$sql_insert = "insert into wt_barber (storename, barbername) values ('$storename','$barbername')";

echo "<br> successfully added $barbername in you store.<br>";

$t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
?>
    <br><br>

    <div class="container-login100-form-btn">
        <br><a class="login100-form-btn" href="barber_registration_form.php?storename=<?php echo $storename ?>" role="button">Add Another Barber</a><br><br>
        <a class="login100-form-btn" href="Dash/dashboard.php" role="button">Back Dashboard</a><br>
    </div>

    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="store_login_form.php">
            LOGOUT
        </a>
    </div>
<?php include ("footer.php");?>