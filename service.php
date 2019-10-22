<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V3</title>
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
            <form class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27">
						Pick Your Favorite Style
					</span>



                <div class="container-login100-form-btn">

                    <?php
                    include("DB/connectDB.php");
                    //MENU.PHP
                    $user = $_GET ["user"];
                    $location = $_GET["location"];
                    $store = $_GET["store"];
                    $barber = $_GET["barber"];

                    $s = "select * from wt_service " ;
                    ($t = mysqli_query($db, $s)) or die(mysqli_error($db));

                    //MENU
                    echo "<select  name=\"service\" >";
                    //OPTIONS
                    while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
                        $style = $r["style"];
                        $price = $r ["price"];

                        echo "<option value = \"$style\">";
                        echo  "$style : ";
                        echo  " $$price ";
                        echo "</option>";
                        echo "<br>";
                    }

                    ////End Option Wrapper
                    echo "</select>";

                    ?>

                    <form class="login100-form validate-form" action="#">

                        <div class="container-login100-form-btn">

                            <button class="login100-form-btn">
                                Don't Click
                            </button>
                        </div>
                    </form>
                    <br><br>
                    <div class="text-center p-t-90">
                        <a class="txt1" href="barber.php?user=<?php echo $user ?>&location=<?php echo $location ?>&location=<?php echo $store ?>&service=<?php echo $style ?>&style=<?php echo $style ?>">
                            Next
                        </a>
                    </div>


                    <!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>