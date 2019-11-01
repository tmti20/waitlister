<?php
//HTML header code in this header.php file
include ("header.php");

//connect database with this connectDB.php file
include ("DB/connectDB.php");

//Get values form login_form.php file
$username = $_POST['username'];
$pass = filter_input(INPUT_POST, 'password' );

//user log in authentication query
$s ="select * from wt_registration where username='$username' and userpass= '$pass'";
($t1= mysqli_query($db, $s) ) or  die ( mysqli_error( $db ) );
$num = mysqli_num_rows ($t1);

if ($num == 0){
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
            <br><h1> Wrong Username or Password</h1><br>
          </span>";

//    Try again button when login fails
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
//Active orders are here
$s = "select * from wt_order where customername = '$username' and orderstatus = 'waiting' ";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
$num = mysqli_num_rows($t);
if ($num == 0) {
    echo "You don't have Any Active Orders";

//        Place order button here
    echo "            
        <br><br>
        <div class=\"container-login100-form-btn\">
            <br><a class=\"login100-form-btn\" methods='post' href=\"location.php?username=$username\">PLACE ORDER</a><br><br>
        </div>";
} else {
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $ordernumber = $r["orderid"];
        $stoername = $r["storename"];
        $barbername = $r["barbername"];
        $service = $r["style"];
        $location = $r["location"];

//            printing active order here
        echo " <br>Order Number: $ordernumber<br>";
        echo " <br>Location: $location<br>";
        echo " <br>Store Name: $stoername<br>";
        echo " <br>Barber Name: $barbername<br>";
        echo " <br>Hair Cut Style: $service<br><br><br>";

    }
//        button for placing order
    echo "       
        <br><br>
        <div class=\"container-login100-form-btn\">
            <br><a class=\"login100-form-btn\" href=\"location.php?username=$username\">PLACE ORDER</a><br><br>
        </div>";

    }
//    logout button
echo "<br><br>
<div class=\"text-center p-t-90\">
    <a class=\"login100-form-btn\" href=\"logout.php\">
        LOGOUT
    </a>
</div>";
}
?>
<?php include ("footer.php");?>
