<?php

    include_once "../config/dbconnect.php";
   
    $order_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT `status` from orders where order_id='$order_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["status"]=='Pending'){
         $update = mysqli_query($conn,"UPDATE orders SET `status`='confirmed' where order_id='$order_id'");
    }
    else if($row["status"]==1){
         $update = mysqli_query($conn,"UPDATE orders SET `status`=0 where order_id='$order_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>