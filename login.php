<?php include ("header.php");?>
<?php
//session_set_cookie_params ( 0, "/~mj342/");
//session_start();
?>

<?php
include ("DB/connectDB.php");

$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, 'password' );

$s ="select * from wt_registration where username='$user' and userpass= '$pass'";
//echo "<br> SQL statement is: $s<br>";
($t1= mysqli_query($db, $s) ) or  die ( mysqli_error( $db ) );
$num = mysqli_num_rows ($t1);

if ($num == 0){
    echo"<h3>Username or password is wrong<h3>
        <br><br><div class=\"container-login100-form-btn\">
    <br>
    <a class=\"login100-form-btn\" href=\"login_form.php\" role=\"button\">Try Again</a><br>
</div>
<div class=\"text-center p-t-90\">
    <a class=\"txt1\" href=\"registration_form.php\">
        Not Registered Yet? Click Here
    </a>
</div>
";  }

else
    echo " <br><br><h2>Welcome to Waitlister.<h2><br><br>
 <div class=\"container-login100-form-btn\">
    <a class=\"login100-form-btn\" href=\"location.php?user=$user\" role=\"button\">Order Here</a><br><br>
</div>

<div class=\"text-center p-t-90\">
    <a class=\"txt1\" href=\"logout.php\">
        LOGOUT
    </a>
</div>

";


?>




<?php include ("footer.php");?>
