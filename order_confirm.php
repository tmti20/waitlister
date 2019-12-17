<?php
	session_start();
	if ( ! $_SESSION["authenticated"])
        {
                header("Location: waitlister.php");
        }
?>
<?php include("header.php"); ?>
    <span class="login100-form-title p-b-34 p-t-27">
    Order Confirm
    </span>

<?php
    include("DB/connectDB.php");
    $username = $_SESSION["username"];
    $location = $_SESSION["location"];
    $store = $_SESSION["store"];
    $barber = $_SESSION["barber"];
    $service = $_SESSION["service"];
    $position = $_SESSION["queue"];


$sql_insert = "insert into wt_order (customername, storename,location, barbername, style, orderdate,position) values ('$username','$store','$location', '$barber', '$service', NOW(), $position )";
$t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
    echo "<br><h3> Hey $username, Your Order is Confirm! <br> Your queue Positoin : $position </h3>";

// ------------------------------------------------------------------
$s = "select * from wt_order where customername = '$username' and barbername = '$barber' " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
    $orderstatus = $r["orderstatus"];
    $orderid = $r['orderid'];
}
echo "<br><h3>Order ID: $orderid </h3>";
?>
<!--Home button here-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="login.php" >
            HOME
        </a>
    </div>
<!--LOGOUT BUTTON HERE-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="logout.php">
            LOGOUT
        </a>
    </div>
    <!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>
