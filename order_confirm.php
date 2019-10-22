<?php include("header.php"); ?>
    <span class="login100-form-title p-b-34 p-t-27">
    Chose a Barber
</span>

<?php
include("DB/connectDB.php");

$user = $_GET ["user"];
$location = $_GET["location"];
$store = $_GET["store"];
$barber = $_GET["barber"];
$service = $_GET["service"];

echo "Your name: $user <br>";
echo "Your City: $location <br>";
echo "Store name: $store <br>";
echo "Barber name: $barber <br>";
echo "Hair Cut style: $service <br>";

//$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
//$pass = filter_input(INPUT_POST, 'password' );

//echo "<br><b>delay :</b> $delay secs";
$queuenumber = "10";

$sql_insert = "insert into wt_order (customername, storename,location, barbername, style, orderdate) values ('$user','$store','$location', '$barber', '$service', NOW() )";
$t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
 echo "<br><h3>Your Order is Confirm! <br> Your queue Number is : $queuenumber <h3>";

// ------------------------------------------------------------------
$s = "select orderstatus from wt_order where customername = '$user' and barbername = '$barber' " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));


while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
    $orderstatus = $r["orderstatus"];
}

echo "<br><h3>Your Order Status : $orderstatus <h3>";
?>

    <!------------------- php code End here ------------------->
    <form  method="post" action="#">

        <div >
            <input class="input100" type="hidden" name="barbername" >
            <input class="input100" type="hidden" name="storename" value="<?php echo $store ?>" >
        </div>


        <div class="container-login100-form-btn">

            <button class="login100-form-btn">
                Don't Click
            </button>
            <!--        <a class="login100-form-btn" href="Dash/dashboard.html" role="button">Back Dashboard</a><br>-->
        </div>
    </form>

    <div class="text-center p-t-90">
        <a class="txt1" href="logout.php">
            LOGOUT
        </a>
    </div>
    <!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>