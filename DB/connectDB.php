<?php

error_reporting(E_ERROR | E_Warning | E_PARSE | E_NOTICE);
ini_set( 'display_errors', 1);
$hostname = "sql1.njit.edu" ;
$DBusername = "ti36" ;
$project = "ti36" ;
$DBpassword = "fQ8f50AMO" ;
//CONNECT to MySQL
$db = mysqli_connect($hostname,$DBusername, $DBpassword ,$project);
if (mysqli_connect_errno()) {
    print "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>