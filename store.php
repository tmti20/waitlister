<!----------------------- Header HTML code here ----------------------->
<?php include("header.php"); ?>
<span class="login100-form-title p-b-34 p-t-27">
    Chose a store
</span>

<!------------------- php code starts here ------------------->
<?php
include("DB/connectDB.php");
//MENU.PHP

$location = "Paterson";
$s = "select storename from wt_store where city = '$location' " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//MENU
echo "<select  name=\"store\">";
//OPTIONS
while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
    $store = $r["storename"];

    echo "<option value = \"$store\">";
    echo  "$store ";
    echo "</option>";
    echo "<br>";
}

//End Option Wrapper
echo "</select>";

?>

<!------------------- php code End here ------------------->

<form  method="post" action="service.php">

    <div >
<!--        <input class="input100" type="hidden" name="barbername" >-->
        <input class="input100" type="hidden" name="storename" value="<?php echo $store ?>" >
    </div>


    <div class="container-login100-form-btn">

        <button class="login100-form-btn">
            Next
        </button>
<!--        <a class="login100-form-btn" href="Dash/dashboard.html" role="button">Back Dashboard</a><br>-->
    </div>
</form>

<!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>
