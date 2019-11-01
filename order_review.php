
<form  method="post" action="order_confirm.php">
<?php
//        HTML HEADER FILE AND GET VALUES FORM PREVIOUS FILE
    include("header.php");
    $username = $_POST['username'];
    $location = $_POST['location'];
    $store = $_POST['store'];
    $barber = $_POST['barber'];
    $service = $_POST['service'];
?>
<!--            PAGE HEADLINE-->
<span class="login100-form-title p-b-34 p-t-27">
    Order Review
</span>

<!--            PRINT ORDER REVIEW-->
<?php
    include("DB/connectDB.php");
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
        Client Name: <h5 > $username </h5><br>
        Store Location:<h5> $location </h5><br>
        Store Name:<h5> $store </h5><br>
        Barber Name:<h5> $barber </h5><br>
        Hair Style:<h5> $service </h5><br>
      </span> "
?>


    <div >
        <input class="input100" type="text"  hidden name="username" value="<?php echo $username;?>"   >
        <input class="input100" type="text"  hidden name="location" value="<?php echo $location;?>"   >
        <input class="input100" type="text"  hidden name="store" value="<?php echo $store;?>"   >
        <input class="input100" type="text"  hidden name="barber" value="<?php echo $barber;?>"   >
        <input class="input100" type="text"  hidden name="service" value="<?php echo $service;?>"   >

    </div>

<!--            CONFIM ORDER BUTTON-->
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Confirm Order
        </button>
    </div>
</form>

<!--        LOGOUT BUTTON-->
<div class="text-center p-t-90">
    <a class="login100-form-btn" href="logout.php">
        LOGOUT
    </a>
</div>
<!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>

