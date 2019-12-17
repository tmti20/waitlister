<?php
session_start();
if ( ! $_SESSION["authenticated"])
{
	header("Location: waitlister.php");	
}
//connect database with this connectDB.php file
include ("DB/connectDB.php");
//$storename = $_GET["storename"];
$storeemail = $_SESSION["storeemail"];
$storename = $_SESSION["storename2"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Waitlister</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="barber_registration.php">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscapes">WL</i>
					</span>
            <span class="login100-form-title p-b-34 p-t-27">
						Manage Barbers
					</span>
         <?php
         $s = "select * from wt_barber where storename = '$storename'";
        ($t = mysqli_query($db, $s)) or die(mysqli_error($db));
        $num = mysqli_num_rows($t);
        if ($num == 0) {
            echo "You don't have Registered Barber! please Add";
        	
        } 
        else { 
            while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
                $barberid = $r["barberid"];
                $barbername = $r["barbername"];
        //            printing active order here
            echo "<h5>    
        		<br > Barber ID: $barberid
            <br> Barber Name : $barbername ";
//    logout button
	echo " <br><a method = 'post' class=\"login100-form-btn\" href=\"deletebarber.php?barberid=$barberid&barbername=$barbername\">DELETE Barber</a><br></h5>";
            }
            }
         ?>                                    
                                                   
           <span class="login100-form-title p-b-34 p-t-27">
						Barber Registration
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="barbername" placeholder="Barber Name">

                </div>

                <div class="container-login100-form-btn">

                    <button class="login100-form-btn">
                        Add Barber
                    </button>
                    <a class="login100-form-btn" href="Dash/dashboard.php" role="button">Back Dashboard</a><br>
                </div>

                <div class="text-center p-t-90">
                    <a class="login100-form-btn" href="store_login_form.php">
                        LOGOUT
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<script src="js/confirmpass.js"></script>

</body>
</html>