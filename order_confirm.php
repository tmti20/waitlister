<?php include("header.php"); ?>
    <span class="login100-form-title p-b-34 p-t-27">
    Order Confirm
    </span>

<?php
    include("DB/connectDB.php");
    $username = $_POST['username'];
    $location = $_POST['location'];
    $store = $_POST['store'];
    $barber = $_POST['barber'];
    $service = $_POST["service"];
    $queuenumber = "10"; // THIS IS JUST RANDOM NUMBER TO PRINT

$sql_insert = "insert into wt_order (customername, storename,location, barbername, style, orderdate) values ('$username','$store','$location', '$barber', '$service', NOW() )";
$t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
    echo "<br><h3> Hey $username, Your Order is Confirm! <br> Your queue Positoin : $queuenumber </h3>";

// ------------------------------------------------------------------
$s = "select * from wt_order where customername = '$username' and barbername = '$barber' " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));


while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
    $orderstatus = $r["orderstatus"];
    $orderid = $r['orderid'];
}

echo "<br><h3>Order ID: $orderid <br>Your Order Status : $orderstatus </h3>";
?>
<!--add order button here-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="location.php?username=<?php echo $username; ?>" >
            ADD Order
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