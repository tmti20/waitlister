<?php
	session_start();
	if ( ! $_SESSION["authenticated"])
        {
                header("Location: waitlister.php");
        }
?>
<form  method="post" action="order_confirm.php">
<?php
//        HTML HEADER FILE AND GET VALUES FORM PREVIOUS FILE
    include("header.php");
    $username = $_SESSION["username"];
    $location = $_SESSION["location"];
    $store = $_SESSION["store"];
    $barber = $_SESSION["barber"];
    $service = $_POST["service"];
    $_SESSION["service"] = $service;
?>
<!--            PAGE HEADLINE-->
<span class="login100-form-title p-b-34 p-t-27">
    Order Review
</span>

<!--            PRINT ORDER REVIEW-->
<?php
    include("DB/connectDB.php");
    
    $s = "select * from wt_order where storename = '$store' and location = '$location' and barbername = '$barber' and orderstatus = 'waiting' ";
    ($t = mysqli_query($db, $s)) or die(mysqli_error($db));
    $num = mysqli_num_rows($t);
    $num = $num + 1;
    $_SESSION["queue"] = $num;
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
        Client Name: <h5 > $username </h5><br>
        Store Location:<h5> $location </h5><br>
        Store Name:<h5> $store </h5><br>
        Barber Name:<h5> $barber </h5><br>
        Hair Style:<h5> $service </h5><br>
        Waitlist Position:<h5> $num </h5><br>
      </span> ";

?>
<!--            CONFIM ORDER BUTTON-->
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Confirm Order
        </button>
    </div>
</form>

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
</div>
<!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>

