<?php
session_start();
$_SESSION["authenticated"] = False;
//HTML header code in this header.php file
include ("header.php");

//connect database with this connectDB.php file
include ("DB/connectDB.php");

//Get values form login_form.php file
//$username = $_SESSION["username"];
$pass = $_SESSION["password"];
//$username = $_POST['username'];
$username = $_SESSION["username"];

//$pass = filter_input(INPUT_POST, 'password' );
//$_SESSION["password"] = $pass;

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
	$_SESSION["authenticated"] = True;
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
            <br><h1> WELCOME $username</h1><br>
          </span>";
//Active orders are here
$s = "select * from wt_order where customername = '$username' ";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
$num = mysqli_num_rows($t);
if ($num == 0) {
    echo "You don't have Any Active Orders";

//        Place order button here
	echo "            
       		<br><br>
       		<div class=\"container-login100-form-btn\">
            	<br><a class=\"login100-form-btn\" methods='post' href=\"location.php\">PLACE ORDER</a><br><br>
       		</div>";
		
} 
elseif ($num > 0) {
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $orderid = $r["orderid"];
        $storename = $r["storename"];
        $barbername = $r["barbername"];
        $service = $r["style"];
        $location = $r["location"];
        $position = $r["position"];

//            printing active order here
        echo " <br>Waitlist Position: $position<br>";
        echo " <br>Order Number: $orderid<br>";
        echo " <br>Location: $location<br>";
        echo " <br>Store Name: $storename<br>";
        echo " <br>Barber Name: $barbername<br>";
        echo " <br>Hair Cut Style: $service<br><br><br>";
        
        $_SESSION["queueid"] = $orderid;
        $_SESSION["storename"] = $storename;
        $_SESSION["barbername"] = $barbername;
        $_SESSION["position"] = $position;
        //        button for placing order
	echo " <br><a class=\"login100-form-btn\" href=\"storequeuedelete.php?orderid=$orderid&storename=$storename&barbername=$barbername&position=$position\">Cancel Order</a><br>";
    }
/*/        button for placing order
	echo "       
        	<br><br>
        	<div class=\"container-login100-form-btn\">
            	<br><a class=\"login100-form-btn\" href=\"location.php\">PLACE ORDER</a><br><br>
        	</div>"; */

    } 
    
//    logout button
echo "
	<br><br>
	<div class=\"text-center p-t-90\">
    	<a class=\"login100-form-btn\" href=\"logout.php\">
        	LOGOUT
    	</a>
	</div>";
}  
?>
<?php include ("footer.php");?>
