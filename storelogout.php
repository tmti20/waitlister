<?php
	session_start();
	session_destroy();
 include ("header.php");
 echo "<span class=\"login100-form-title p-b-34 p-t-27\">
            <br><h1> Thanks for using Our System. </h1><br>
          </span>";
header( "Refresh:5; url='store_login_form.php'");
?>
<?php include ("footer.php");?>
