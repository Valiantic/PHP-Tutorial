<?php

session_start();

if(!isset($_SESSION["username"])) { // Check if username session variable is set
  header("location:admin.php");   // Redirect to admin.php if not set
}

// Code to display admin panel content would be here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <h1>"Hello world"</h1>
</body>
</html>