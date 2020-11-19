<?php
session_start();
require_once("database.php"); 
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	  $username = $_POST["admin_username"];
	  $password = $_POST["admin_password"];
	
	  $sql = "SELECT * from admin WHERE admin_username='$username' and admin_password='$password'"; 

			$query = pg_query($conn, $sql);
			$exists = pg_num_rows($query); 
		    if($exists==1){
		        $row = pg_fetch_assoc($query);
		        $_SESSION['adminlogin'] = true;
		        $_SESSION['session_admin_username'] = $row['admin_username'];
		        header("Location:adminheader1.php");
		    }else{
		    	$usermsg="Enter Correct Username and Password";		    	
		    }
	
		    //close connection
	    	pg_close($conn);

		}
?>