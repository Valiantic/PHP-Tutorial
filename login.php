<?php

$email = $password = "";

$emailErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["Email"])){
        $emailErr = "Email is Required!";
    }else {
        $email = $_POST["Email"];
    }

    if(empty($_POST["Password"])){
        $passwordErr = "Password is required";
    }else {
        $password = $_POST["Password"];
    }


    if($email && $password){
        include("connections.php");
    }
}


if($email && $password) {
    include("connections.php");

    $check_email = mysqli_query($connections, "SELECT * FROM tbl_accounts WHERE Email='$email'");
    $check_email_row = mysqli_num_rows($check_email);

    if($check_email_row > 0){

        while($row = mysqli_fetch_assoc($check_email)) {

            $db_password = $row["Password"];
            $db_account_type = $row["account_type"];

                if($password == $db_password){

                    if($db_account_type == "1"){
                        echo "<script>window.location.href='admin';</script>";
                    }
                    else{
                        echo "<script>window.location.href='user';</script>";
                    }

                }
                else{
                    $passwordErr = "Password is incorrect!";
                }

        }

    }else{
            $emailErr = "Email is not Registered!";
    }

}

?>

<style>
    .error{
        color:red;
    }
</style>

<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<input type="text" name="Email" value="<?php echo $email; ?>"> <br>
<span class="error"><?php echo $emailErr; ?></span> <br>

<input type="text" name="Password" value="<?php echo $password; ?>"> <br>
<span class="error"><?php echo $passwordErr; ?></span> <br>

<input type="submit" value="Login">

</form>