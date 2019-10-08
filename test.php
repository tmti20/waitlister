<?php

error_reporting(E_ERROR | E_Warning | E_PARSE | E_NOTICE);
ini_set( 'display_errors', 1);

include ("account.php");

//CONNECT to MySQL
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno()) {
	  print "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
?>

<?php
//MENU.PHP
$s = "select distinct city from wt_store " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//MENU 
  echo "<select name=\"account\">";
  
//OPTIONS 
   while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
       $location = $r["city"];
       $store = $r["storename"];
        
   echo "<option value = \"$location\">";
   echo  "$location ";
   echo "</option>";
   }
   
 //End Option Wrapper
echo "</select>";
//End Menu Wrapper
?>