

<?php

$email = $username = $password = "";
$emailErr = $usernameErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

  // Blank field detector
  if(empty ($_POST["email"])){
    $emailErr = "Email is Required!";
  } else {
    $email = $_POST["email"];
  }

  if(empty ($_POST["username"])){
    $usernameErr = "Username is Required!";
  } else {
    $username = $_POST["username"];
  }

  if(empty ($_POST["password"])){
    $passwordErr = "Password is Required!";
  } else {
    $password = $_POST["password"];
  }
}

?>

<style>
  .error {
    color: red;
  }
</style>


<br>

<?php include("nav.php"); ?>

<br>
<br>

<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<!-- input field -->

<input type="text" name="email" value="<?php echo $email; ?>"> <br>
<span class="error"><?php echo $emailErr; ?></span> <br>

<input type="text" name="username" value="<?php echo $username; ?>"> <br>
<span class="error"><?php echo $usernameErr; ?></span> <br>

<input type="password" name="password" value="<?php echo $password; ?>"> <br>
<span class="error"><?php echo $passwordErr; ?></span> <br>

<input type="submit" value="Submit">

</form>

<hr>

<?php

// database connector
// include means importin other variable 
// from other file to this file
include("connections.php");


if ($email && $username && $password) {
  //  adding a user to the database 
   $query = mysqli_query($connections, "INSERT INTO tbl_accounts(Email,Username,Password) VALUES('$email','$username','$password')");

  // indicator that a new account is inserted using js 
  echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
  echo "<script>window.location.href='index.php';</script>";
  }

  // read the user 
  $view_query = mysqli_query($connections, "SELECT * FROM tbl_accounts");


 // envelope the users account in a form of a table 

 echo "<table border='1' width='50%'>";
 echo "<tr>
        <td>Email</td>
        <td>Username</td>
        <td>Password</td>

        <td>Options</td>  
      </tr>";
      // another column for options this is for updating and deleting.

  while($row = mysqli_fetch_assoc($view_query)){

    $user_id = $row["id"]; // delcare the id 


    // make sure that paramets inside row is same on the database column 
    // CHECK CAPITALIZATION!!!
    $db_Email = $row["Email"];
    $db_Username = $row["Username"];
    $db_Password = $row["Password"];

    // inside the table the update tag create another php called "Edit" then call the id variable
    echo "<tr>
             <td>$db_Email</td>
             <td>$db_Username</td>
             <td>$db_Password</td>

             <td>
          
             <a href='Edit.php?id=$user_id'>Update</a>
             &nbsp;

             <a href='Confirmdelete.php?id=$user_id'>Delete</a>
             </td>
            
          </tr>";
            //add another td for update and delete
  }

echo "</table>";
?>

<hr>

<?php

$alverhx = "Alverhx";
$steven = "Steven";
$owric = "Owric";

$names = array ("$alverhx", "$steven", "$owric");

foreach($names as $display_names) {
  echo $display_names . "<br>";
}


?>

