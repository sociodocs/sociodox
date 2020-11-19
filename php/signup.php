<?php

//Sign Up Aditya
require_once("database.php"); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST["username"];
$password = $_POST["password"];
$email_phone = $_POST["email_phone"];

    $bool = true;

	$sql = "Select * from users"; 
	$query = pg_query($conn, $sql);
	while($row = pg_fetch_assoc($query))
	{
		$table_users = $row['username']; 
		if($username == $table_users) 
		{
			$bool = false; 
			Print '<script>alert("Username has been taken!");</script>';
			Print '<script>window.location.assign("../index.html");</script>';
		}
	}

	if($bool) 
	{   
		if(filter_var($email_phone,FILTER_VALIDATE_EMAIL)){
			$sql1 = "INSERT INTO users VALUES('$username','$email_phone',null,'$password')";
		}
		else{
			$sql1 = "INSERT INTO users VALUES('$username',null,'$email_phone','$password')";
		}
		
			$result = pg_query($conn,$sql1) or die("could");
		if($result){
			Print '<script>alert("Successfully Registered! Please Login ");</script>'; 
		    Print '<script>window.location.assign("../index.html");</script>'; 
            }
		 else {
			 echo "error";
		 }
		

     }
  }

?>