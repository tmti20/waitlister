
<form class="login100-form validate-form" method="post" action="service.php">

    <?php
    include "header.php";
    $username = $_POST['username'];
    $location = $_POST['location'];
    $store = $_POST['store'];

    ?>
<!--    BARBER PAGE HEADLINE-->
    <span class="login100-form-title p-b-34 p-t-27">
        Pick A Barber
    </span>

<!--    BARBER MENU HERE START-->
    <?php
    include("DB/connectDB.php");
    $s = "select * from wt_barber ";
    ($t = mysqli_query($db, $s)) or die(mysqli_error($db));
    echo "<select  name=\"barber\">";
    while (($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) || ($o = mysqli_fetch_array($t2, MYSQLI_ASSOC))) {
        $barber = $r["barbername"];
        echo "<option value = \"$barber\">";
        echo "$barber <br>";
        echo "</option>";
    }
    //BARBER MENU END HERE
    echo "</select>";
    ?>

<!--    NEXT BUTTON HERE-->
    <input class="input100" type="text"  hidden name="username" value="<?php echo $username;?>"   >
    <input class="input100" type="text"  hidden name="location" value="<?php echo $location;?>"   >
    <input class="input100" type="text"  hidden name="store" value="<?php echo $store;?>"   >
        <div class="container-login100-form-btn">
    <button class="login100-form-btn" type="submit" > Next </button>
        </div>

<!--    LOGOUT-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="logout.php">
            LOGOUT
        </a>
</form>
<?php include "footer.php"; ?>