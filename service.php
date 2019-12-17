<?php
	session_start();
	if ( ! $_SESSION["authenticated"])
        {
                header("Location: waitlister.php");
        }
?>
<form class="login100-form validate-form" method="post" action="order_review.php">

<?php
include "header.php";
$username = $_SESSION["username"];
$location = $_SESSION["location"];
$store = $_SESSION["store"];
$barber = $_POST["barber"];
$_SESSION["barber"] = $barber;
 ?>
<!--        SERVICE PAGE HEADLINE HERE-->
    <span class="login100-form-title p-b-34 p-t-27">
        CHOOSE STYLE
    </span>
<!--         SERVICE MENU HERE-->
<?php
include("DB/connectDB.php");
$s = "select * from wt_service ";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

echo "<select  name=\"service\" >";
while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
    $service = $r["style"];
    $price = $r ["price"];

    echo "<option value = \"$service\">";
    echo "$service : ";
    echo " $$price ";
    echo "</option>";
    echo "<br>";
}
////END THE MENU
echo "</select>";
?>
<!--//NEXT BUTTON-->
    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit" > Next </button>
    </div>

<!--Home button here-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="login.php" >
            HOME
        </a>
    </div>
<!--        LOGOUT BUTTON-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="logout.php">
            LOGOUT
        </a>
</form>
<?php include "footer.php"; ?>
