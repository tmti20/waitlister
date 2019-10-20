<?php
   session_set_cookie_params ( 0, "/~mj342/");
   session_start();
?>

<?php
include ("DB/connectDB.php");

$user = $_GET["username"];
$email = $_GET[ "email" ];
$pass = $_GET[ "password" ];
$confirm = $_GET["confirm"];
$delay = 5;

//echo "<br><b>delay :</b> $delay secs";

if ($pass == $confirm) {
  $password = $pass;
  
  $sql_insert = "insert into wt_registration (username, userpass, email) values ('$user', '$pass', '$email' )";
  echo "<br> SQL statement: $sql_insert<br>";

  echo "<br> $user";
  print $email;
  print $password;
  
  $t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
}

?>
