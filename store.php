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

<!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>
