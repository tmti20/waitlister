<?php
	session_start();
	if ( ! $_SESSION["authenticated"])
	{
		header("Location: waitlister.php");	
	}
?>
<form class="login100-form validate-form" method="post" action="store.php">

<!--    Get user valu from login.php page and HTML header.php file is here below-->
<?php
$username = $_SESSION["username"];
include "header.php";
?>
<!--    Here is the headline test-->
    <span class="login100-form-title p-b-34 p-t-27">
        Pick Your Location
    </span>

<!--LOCATION MENU START HERE-->
    <?php
    include("DB/connectDB.php");

    $s = "select distinct city from wt_store ";
    ($t = mysqli_query($db, $s)) or die(mysqli_error($db));

    //MENU
    echo "<select  name=\"location\">";
    //OPTIONS
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $location = $r["city"];

        echo "<option value = \"$location\">";
        echo "$location ";
        echo "</option>";
        echo "<br>";
    }
    echo "</select>";
//    LOCATION MENU END HERE
    ?>

<!--NEXT BUTTON TO GO TO STORE.PHP FILE-->
    <div class="container-login100-form-btn">
    	<button class="login100-form-btn" type="submit" > Next </button>
    </div>

</form>


<!--Home button here-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="login.php" >
            HOME
        </a>
    </div>
<!--LOGOUT BUTTON-->
<div class="text-center p-t-90">
    <a class="login100-form-btn" href="logout.php">
        LOGOUT
    </a>
</div>

<?php include "footer.php"; ?>
