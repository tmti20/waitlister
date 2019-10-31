<?php session_start();
$username = $_GET["username"];
?>
<form class="login100-form validate-form" method="post" action="store.php">

<?php include "header.php"; ?>
    <span class="login100-form-title p-b-34 p-t-27">
        Pick Your Location
    </span>
    <?php include("location_menu.php"); ?>
    <input class="input100" type="text"  hidden name="username" value="<?php echo $username;?>"   >
    <div class="container-login100-form-btn">
    <button class="login100-form-btn" type="submit" > Next </button>
    </div>


</form>

<div class="text-center p-t-90">
    <a class="login100-form-btn" href="logout.php">
        LOGOUT
    </a>
</div>


<?php include "footer.php"; ?>