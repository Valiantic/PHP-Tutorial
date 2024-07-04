
<?php

$user_id = $_REQUEST["id"]; // achor tag of update 


include("connections.php"); // add database access 

$get_record = mysqli_query($connections, "SELECT * FROM tbl_accounts WHERE id='$user_id'"); // get id of a certain account



while($row_edit = mysqli_fetch_assoc($get_record)) {  // fetch data 


    $db_Email = $row_edit["Email"];  
    $db_Username = $row_edit["Username"];
    $db_Password = $row_edit["Password"];
    
}

?>

<!-- pass the argument action to another update file  -->
<form method="POST" action="update.php"> 

<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<input type="text" name="new_email" value="<?php echo $db_Email; ?>">
<Br>
<input type="text" name="new_username" value="<?php echo $db_Username; ?>">
<Br>
<input type="text" name="new_password" value="<?php echo $db_Password; ?>">
<Br>

<input type="submit" value="Update">

</form>
