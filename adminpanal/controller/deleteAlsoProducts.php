<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM products where user_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Customer Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
    
?>