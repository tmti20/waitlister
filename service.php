<?php session_start();
//echo $_SESSION ['username'];
$username = $_POST['username'];
$location = $_POST['location'];
$store = $_POST['store'];
$barber = $_POST['barber'];
//echo "test";
?>
    <form class="login100-form validate-form" method="post" action="order_review.php">

        <?php include "header.php"; ?>
        <span class="login100-form-title p-b-34 p-t-27">
        CHOOSE STYLE
    </span>
        <?php include("service_menu.php"); ?>
        <input class="input100" type="text"  hidden name="username" value="<?php echo $username;?>"   >
        <input class="input100" type="text"  hidden name="location" value="<?php echo $location;?>"   >
        <input class="input100" type="text"  hidden name="store" value="<?php echo $store;?>"   >
        <input class="input100" type="text"  hidden name="barber" value="<?php echo $barber;?>"   >
        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" > Next </button>
        </div>

        <div class="text-center p-t-90">
            <a class="login100-form-btn" href="logout.php">
                LOGOUT
            </a>
    </form>
<?php include "footer.php"; ?>