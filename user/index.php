<?php

session_start();

if(isset($_SESSION["id"])){


    $user_id = $_SESSION["id"];

        include("../connections.php");

        $get_record = mysqli_query($connections, "SELECT * FROM tbl_accounts WHERE id='$user_id'");
        while($row_edit = mysqli_fetch_assoc($get_record)){

            $db_email = $row_edit["Email"];
            $db_username = $row_edit["Username"];
            $db_password = $row_edit["Password"];

        }
        echo "Welcome $db_username ! <a href='logout.php'>Logout</a>";

}else{


    echo "You must login first! <a href='../login.php'>Login now!</a>";


}



?>