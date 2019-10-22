<!----------------------- Header HTML code here ----------------------->
<?php include("header.php"); ?>
<span class="login100-form-title p-b-34 p-t-27">
    Chose a Barber
</span>

<!------------------- php code starts here ------------------->
<?php


include("DB/connectDB.php");

$user = $_GET ["user"];
$location = $_GET["location"];
$store = $_GET["store"];

//MENU.PHP

$s = "select * from wt_barber where storename = '$store' " ;
//$q = "select queuenumber from wt_queue where barbername = '$barbername'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
//($t2 = mysqli_query($db, $q)) or die(mysqli_error($db));

//$star = "";
//MENU
echo "<select  name=\"barber\">";
//OPTIONS
while (($r = mysqli_fetch_array($t,MYSQLI_ASSOC)) || ($o = mysqli_fetch_array($t2,MYSQLI_ASSOC)) ) {
    $barber = $r["barbername"];
    //$rating = $r["rating"];
    //$queuenumber = $o["queuenumber"];
    //include ("rating.php");
    echo "<option value = \"$barber\">";
    echo  "$barber <br>";
    //echo  "<br>| Queue : $queuenumber";
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
    <a class="txt1" href="service.php?user=<?php echo $user ?>&location=<?php echo $location ?>&store=<?php echo $store ?>&barber=<?php echo $barber ?>">
        Next
    </a>
</div>
<!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>
