<?php


include("connections.php");

if(empty($_GET["search"])){

    echo "no value";
    
}else{

    $check = $_GET["search"];

    $terms = explode(" ", $check);
    $q = " SELECT * FROM tbl_accounts WHERE ";
    $i = 0;

        foreach($terms as $each){

            $i++;

            if($i==1){
                $q .= "Email LIKE '%$each%' ";
            }else {
                $q .= "OR Email LIKE '%$each%' ";
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