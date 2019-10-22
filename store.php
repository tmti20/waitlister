<!----------------------- Header HTML code here ----------------------->
<?php include("header.php"); ?>
<span class="login100-form-title p-b-34 p-t-27">
    Chose a store
</span>

<!------------------- php code starts here ------------------->
<?php
include("DB/connectDB.php");
//MENU.PHP
$user = $_GET ["user"];
$location = $_GET["location"];
echo $location;

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
    <a class="txt1" href="barber.php?user=<?php echo $user ?>&location=<?php echo $location ?>&store=<?php echo $store ?>">
        Next
    </a>
</div>

<!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>
