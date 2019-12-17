<style>
h5 {
  border-style: double;
}
</style>
<?php
session_start();

//connect database with this connectDB.php file
include ("DB/connectDB.php");
//Active orders are here
$s = "select * from wt_order where storename = '$storename'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
$num = mysqli_num_rows($t);
if ($num == 0) {
    echo "You don't have Any Active Orders";
	
} 
else { $num = 1;
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $orderid = $r["orderid"];
        $customername = $r["customername"];
        $barbername = $r["barbername"];
	      $position = $r["position"];
        //$_SESSION['queue'] = $orderid;
//            printing active order here
        echo "<h5> 
		 
		<br > Order ID: $orderid
		<br>Customer: $customername
    <br>Position : $position
    <br> Barber Name : $barbername
		 ";
		
		$num = $num + 1;
//        button for placing order
	echo " <br><a method = 'post' class=\"text-center p-t-90\" href=\"../deletequeue.php?orderid=$orderid&barbername=$barbername&position2=$position\">DELETE</a><br></h5>";
    }
    }
?>
<?php //include ("footer.php");?>