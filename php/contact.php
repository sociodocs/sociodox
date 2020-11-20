<?php
     //contact by Aditya
     if($_SERVER["REQUEST_METHOD"] == "POST"){
     require_once("database.php");

     $fname = $_POST["cfname"];
     $lname = $_POST["clname"];
     $email = $_POST["cemail"];
     $mobile_no = $_POST["cmobile_no"];
     $msg = $_POST["cmsg"];
     if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	    echo "email is valid";
    }
	  else{
		Print '<script>alert("Invalid email ! Please Enter again.");</script>'; 
		Print '<script>window.location.assign("../index.html");</script>'; 
	
    }
    echo "$fname";
    echo "$lname";
    echo "$email";
    echo "$mobile_no";
    echo "$msg";
    echo "</br>";
    
    $sql1 = "INSERT INTO contact(first_name,last_name,email,mobile_no,msg) values ('$fname','$lname','$email','$mobile_no','$msg')";
    $result = pg_query($conn,$sql1) or die("query fails"); 
		if($result){
			Print '<script>alert("Thank you For contacting us!");</script>'; 
		    Print '<script>window.location.assign("../index.html");</script>'; 
            }
		 else {
			 echo "error";
             }
        
    pg_close($conn);		
  }
?>