
<form class="login100-form validate-form" method="post" action="barber.php">

<?php
//HTML HEADER FILE AND GET VALUES FORM PREVIOUS FILE
include "header.php";
$username = $_POST['username'];
$location = $_POST['location'];
?>
<!--    SITE HEADLINE-->
    <span class="login100-form-title p-b-34 p-t-27">
        Pick Your Store
    </span>
    <?php
//STORE MENU
    include("DB/connectDB.php");
    $s = "select distinct storename from wt_store ";
    ($t = mysqli_query($db, $s)) or die(mysqli_error($db));

    echo "<select  name=\"store\">";
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $store = $r["storename"];
        echo "<option value = \"$store\">";
        echo "$store ";
        echo "</option>";
        echo "<br>";
    }

    //End STORE MENU
    echo "</select>";
    ?>
<!--    NEXT BUTTON-->
    <input class="input100" type="text"  hidden name="username" value="<?php echo $username;?>"   >
    <input class="input100" type="text"  hidden name="location" value="<?php echo $location;?>"   >
    <div class="container-login100-form-btn">
    <button class="login100-form-btn" type="submit" > Next </button>
    </div>

<!--    LOGOUT BUTTON-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="logout.php">
            LOGOUT
        </a>
</form>
<?php include "footer.php"; ?>