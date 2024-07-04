<?php

include("connections.php"); // add database access 

$user_id = $_POST["user_id"]; // get the id 

$new_email = $_POST["new_email"]; // new email 
$new_username = $_POST["new_username"]; // new username
$new_password = $_POST["new_password"]; // new password 

mysqli_query($connections, "UPDATE tbl_accounts SET Email='$new_email', Username='$new_username', Password='$new_password' WHERE id='$user_id'");


echo "<script language='javascript'>alert('Record has been updated!')</script>"; //alert method 
echo "<script>window.location.href='index.php';</script>";
?>