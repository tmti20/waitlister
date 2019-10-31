<?php
session_start();
include ("header.php");?>

<?php
include ("DB/connectDB.php");

$username = $_POST['username'];
$pass = filter_input(INPUT_POST, 'password' );

$s ="select * from wt_registration where username='$username' and userpass= '$pass'";
//echo "<br> SQL statement is: $s<br>";
($t1= mysqli_query($db, $s) ) or  die ( mysqli_error( $db ) );
$num = mysqli_num_rows ($t1);

if ($num == 0){
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
            <br><h1> Wrong Username or Password</h1><br>
          </span>";
    echo "<br><br>
        <div class=\"container-login100-form-btn\">
            <br><a class=\"login100-form-btn\" href=\"login_form.php\">TRY AGAIN</a><br><br>
        </div>";
    exit();
}
else {
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
            <br><h1> WELCOME $username</h1><br>
          </span>";

    $s = "select * from wt_order where customername = '$username' and orderstatus = 'waiting' ";
    ($t = mysqli_query($db, $s)) or die(mysqli_error($db));
    $num = mysqli_num_rows($t);
    if ($num == 0) {
        echo "You don't have Any Active Orders";
        echo "            
            <br><br>
            <div class=\"container-login100-form-btn\">
                <br><a class=\"login100-form-btn\" methods='post' href=\"location.php?username=$username\">PLACE ORDER</a><br><br>
            </div>";
    } else {
//    echo " <br><br>You have $num Active orders<br><br>";
        while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
            $ordernumber = $r["orderid"];
            $stoername = $r["storename"];
            $barbername = $r["barbername"];
            $service = $r["style"];
            $location = $r["location"];

            echo " <br>Order Number: $ordernumber<br>";
            echo " <br>Location: $location<br>";
            echo " <br>Store Name: $stoername<br>";
            echo " <br>Barber Name: $barbername<br>";
            echo " <br>Hair Cut Style: $service<br><br><br>";

        }
        echo "       
            <br><br>
            <div class=\"container-login100-form-btn\">
                <br><a class=\"login100-form-btn\" href=\"location.php?username=$username\">PLACE ORDER</a><br><br>
            </div>";

    }
echo "<br><br>
<div class=\"text-center p-t-90\">
    <a class=\"login100-form-btn\" href=\"logout.php\">
        LOGOUT
    </a>
</div>";

}
?>

<?php include ("footer.php");?>
