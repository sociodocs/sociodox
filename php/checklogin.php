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
	echo "$exists";
	$table_users = "";
	$table_users1 ="";
	$table_password = "";
	if($exists > 0) 
	{
		while($row = pg_fetch_assoc($query)) 
		{
			$table_users = $row['email']; 
			$table_users1 =$row['mobile_no'];
			$table_password = $row['password'];
		}
		if(($email_phone == $table_users) && ($password == $table_password)||($email_phone == $table_users1) && ($password == $table_password))
		{
				if($password == $table_password)
				{
					$_SESSION['email'] = $email_phone; 
					header("location: #"); 
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
		Print '<script>window.location.assign("index.html");</script>'; 
	}

	pg_close($conn);
}
?>
