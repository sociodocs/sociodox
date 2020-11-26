<?php
	//Checking of login By Aditya
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	require_once("database.php"); 
	$password = $_POST["password"];
	$email_phone = $_POST["email_phone"];
	echo "$email_phone";
	if(filter_var($email_phone,FILTER_VALIDATE_EMAIL)){
		$sql = "SELECT * from users WHERE email='$email_phone'"; 
	}
	else{
		$sql = "SELECT * from users WHERE mobile_no='$email_phone'"; 
	}
	$query = pg_query($conn, $sql);
	$exists = pg_num_rows($query); 	
	$table_users = "";
	$table_users1 ="";
	$table_password = "";	
	if($exists > 0) 
	{
		while($row = pg_fetch_assoc($query)) 
		{
			$table_users = $row['email']; 
			$table_users1 =$row['mobile_no'];
			$table_username =$row['username'];
			$table_password = $row['password'];
		}
		if(($email_phone == $table_users) &&  password_verify($password,$table_password)||($email_phone == $table_users1) &&  password_verify($password,$table_password))
		{				
				
				if(password_verify($password,$table_password))
				{
					$_SESSION['email'] = $email_phone;
					$_SESSION['username'] = $table_username;
					$_SESSION['password'] = $password;  
					header("location:checkprofile.php"); 
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; 
			Print '<script>window.location.assign("../index.html");</script>'; 
		}

	}
	else
	{
		Print '<script>alert("Invalid email or phone number!");</script>'; 
		Print '<script>window.location.assign("../index.html");</script>'; 
	}

	$username = $_SESSION['username'];
	$sql = "SELECT * from profile"; 	
	$query = pg_query($conn, $sql);
	$exists = pg_num_rows($query); 	
	$table_username = "";
	if($exists > 0) 
	{
		while($row = pg_fetch_assoc($query)) 
		{
			$table_username = $row['username'];
		
			if($username == $table_username)
				{                            
					$_SESSION['first_name'] = $row['first_name']; 
					$_SESSION['last_name'] = $row['last_name']; 
					$_SESSION['email'] = $row['email']; 
					$_SESSION['mobile_no'] = $row['mobile_no']; 
					$_SESSION['dp'] = $row['dp']; 
					$_SESSION['username']=$row['username'];
					header("location:profile.php"); 
				}
				
		}
	}

	pg_close($conn);
}
?>
