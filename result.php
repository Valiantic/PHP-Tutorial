<?php

// include again the database 
include("connections.php");

if(empty($_GET["search"])){  

    echo "no value";  // check if the search button has no value 
    
}else{  // else search the value if there is one

    $check = $_GET["search"];

    $terms = explode(" ", $check);
    $q = " SELECT * FROM tbl_accounts WHERE ";  // always check the query 
    $i = 0;

        foreach($terms as $each){

            $i++;

            if($i==1){
                $q .= "Email LIKE '%$each%' ";  // LIKE QUERY 
            }else {
                $q .= "OR Email LIKE '%$each%' "; // LIKE QUERY 
            }

        }

        $query = mysqli_query($connections, $q);
        $c_q = mysqli_num_rows($query);

        if($c_q > 0 && $check!=""){

            while($row = mysqli_fetch_assoc($query)){
                echo $email = $row["Email"] . "<br>";
            }
    
        }else {
            echo "no result";
        }
    


}



?>