<?php include ("header.php");?>
<?php
   session_set_cookie_params ( 0, "/~mj342/");
   session_start();
?>

<?php
include ("DB/connectDB.php");

$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$pass = filter_input(INPUT_POST, 'password' );

//echo "<br><b>delay :</b> $delay secs";

  $sql_insert = "insert into wt_registration (username, userpass, email) values ('$user','$pass','$email' )";
  echo "<br> SQL statement: $sql_insert<br>";

  echo "<br> $user<br>";
  echo "$email<br>";
  echo "$pass<br>";
  
  $t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement

?>

<?php include ("footer.php");?>
