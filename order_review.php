
<!----------------------- Header HTML code here ----------------------->
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
    <a class="txt1" href="order_confirm.php?user=<?php echo $user ?>&location=<?php echo $location ?>&store=<?php echo $store ?>&barber=<?php echo $barber ?>&service=<?php echo $service ?>">
        CONFIRM ORDER
    </a>
</div>
<!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>

