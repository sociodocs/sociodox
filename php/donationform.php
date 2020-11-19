<?php
	//donation form  By Aditya
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once("database.php"); 
        $first_name = $_POST["first-name"];
        $last_name = $_POST["last-name"];
        $email = $_POST["email"];
        $mobile  = $_POST["mobile"];
        $pan = $_POST["pan"];    
        $country = $_POST["country"];
        $note = $_POST["add-note"];
        $don_type =$_POST["don-type"];
        $amount = $_POST["amount"];
        $org = $_POST["org_name"];
        echo "$first_name";
        echo "$last_name";
        echo "$email";
        echo $mobile;
        echo $pan;
        echo $country;
        echo $note;
        echo "$amount";
        echo $don_type;
        echo $org;
        echo "<br>";
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "email is valid";
        }
        else{
            Print '<script>alert("Invalid email ! Please Enter again.");</script>'; 
            Print '<script>window.location.assign("../index.html");</script>'; 
        
        }
        $sql1 = pg_query($conn,"select org_id from organization where org_name='$org'") or die("could");
            if($sql1){
                while($row = pg_fetch_assoc($sql1))
                {
                    $org_id = $row['org_id']; 
                }
            }
        echo $org_id;
        $sql2 = "INSERT INTO donation(donation_id,first_name,last_name,email,mobile_no,pan,country,amount_status,amount,comment,org_id) values (default,'$first_name','$last_name','$email','$mobile','$pan','$country','$don_type','$amount','$note','$org_id')";
        $result = pg_query($conn,$sql2) or die("could");
            if($result){
                Print '<script>alert("Successfully Fill the Donation form,Thank You!");</script>'; 
                Print '<script>window.location.assign("../index.html");</script>'; 
                }
            else {
                echo "error";
                }
            
        $sql3 = "select sum(amount) as amount_sum from donation";
        $result2 = pg_query($conn,$sql3) or die("query fail !");
        $row = pg_fetch_assoc($result2);
        $sum = $row['amount_sum'];
        echo "</br>Total amount to be donated $sum";

        pg_close($conn);		 

    }

?>