<?php
	//donation form  By Aditya
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	require_once("database.php"); 
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $amount = $_POST["amount"];
    if(isset($_POST["view"])){
        $status = "one-time";
    }
    else{
        $status = "monthly";
    }
    echo "$first_name";
    echo "$last_name";
    echo "$email";
    echo "$amount";
    echo "$status";
    echo "<br>";
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	    echo "email is valid";
	}
	else{
		Print '<script>alert("Invalid email ! Please Enter again.");</script>'; 
		Print '<script>window.location.assign("../donation.html");</script>'; 
	
    }

    $sql1 = "INSERT INTO donation(first_name,last_name,email,mobile_no,amount_status,amount,comment) values ('$first_name','$last_name','$email',null,'$status','$amount',null)";
    $result = pg_query($conn,$sql1) or die("could");
		if($result){
			Print '<script>alert("Successfully Fill the Donation form,Thank You!");</script>'; 
		    Print '<script>window.location.assign("#");</script>'; 
            }
		 else {
			 echo "error";
	    	 }
         
    $sql2 = "select sum(amount) as amount_sum from donation";
    $result = pg_query($conn,$sql2) or die("query fail !");
    $row = pg_fetch_assoc($result);
    $sum = $row['amount_sum'];
    echo "</br>Total amount to be donated $sum";

    pg_close($conn);		

}

?>