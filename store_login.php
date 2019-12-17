<?php
session_start();
$_SESSION["authenticated"] = False;
include ("header.php");
include ("DB/connectDB.php");
$storeemail = filter_input(INPUT_POST, 'storeemail', FILTER_SANITIZE_STRING);
$storepass = filter_input(INPUT_POST, 'storepassword' );
$_SESSION["storeemail"] = $storeemail;

$s ="select * from wt_store where storeemail='$storeemail' and storepass= '$storepass'";
($t1= mysqli_query($db, $s) ) or  die ( mysqli_error( $db ) );
$num = mysqli_num_rows ($t1);
while ($r1 = mysqli_fetch_array($t1,MYSQLI_ASSOC)){
$storename = $r1["storename"];
$_SESSION["storename2"] = $storename;
}
//$r = mysqli_fetch_array($t1, MYSQLI_ASSOC)
//$storename = $r["storename"];
//echo $storename;
if ($num == 0){
    echo " Not Registered Yet? Click Here ";
    echo "<br><br>
        <div class=\"container-login100-form-btn\">
            <br><a class=\"login100-form-btn\" href=\"store_login_form.php\">TRY AGAIN</a><br><br>
        </div>";
}
else {
  $_SESSION["authenticated"] = True;
    echo " <br><br><h2>Welcome to Waitlister.<h2><br><br>
 <div class=\"container-login100-form-btn\">
    <a class=\"login100-form-btn\" href=\"Dash/dashboard.php\" role=\"button\">Go Dashboard</a><br><br>
</div>
";
}
?>

<?php include ("footer.php");?>
