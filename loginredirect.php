<?php
session_start();
$username = $_POST['username'];
$_SESSION["username"] = $username;
$pass = filter_input(INPUT_POST, 'password' );
$_SESSION["password"] = $pass;

header("Location: login.php");

?>