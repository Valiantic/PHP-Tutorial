<?php

$user_id = $_REQUEST["id"];


include("connections.php");

$query_delete = mysqli_query($connections, "SELECT * FROM tbl_accounts WHERE id = '$user_id' ");

    while($row_delete = mysqli_fetch_assoc($query_delete)){
            $user_id = $row_delete ["id"];

            $db_email = $row_delete ["Email"];
            $db_username = $row_delete ["Username"];
            $db_password = $row_delete ["Password"];
    }

echo "<h1> Are you sure you want to delete $db_name ? </h1>";

?>

<form method="POST" action="DeleteNow.php">

<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

<Br>
<Br>

<input type="submit" value="Yes"> &nbsp; <a href='index.php'>No</a>

</form>