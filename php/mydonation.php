<?php
include("database.php");
session_start();
    $sum = '';
    $semail = '';
    $semail=$_SESSION['email'];
    echo $semail."<br>"; 
    if(filter_var($semail,FILTER_VALIDATE_EMAIL)){
        
        $dquery = pg_query($conn, "select * from donation where email='$semail'");
    }

    else{
          
        $dquery = pg_query($conn, "select * from donation where mobile_no='$semail'");
     
     }
   
    $exists = pg_num_rows($dquery); 
    if($exists > 0){
        
        $sql2 = "select sum(amount) as amount_sum from donation";
        $rsum = pg_query($conn,$sql2) or die("query fail !");
        $row = pg_fetch_assoc($rsum);
        $sum = $row['amount_sum'];
        Print '<script>document.getElementById("dn").innerHTML = $sum;</script>'; 
    }
    echo "Amount donated is :<br>";
    echo $sum;
      die;
?>