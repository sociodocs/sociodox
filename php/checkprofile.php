<?php
    //Checking of profile By Aditya
    session_start();
	require_once("database.php"); 
    if(isset($_SESSION['dp'])==true){	
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
                        header("location:profile.php"); 
                    }
                    
            }
        }
    }else{
			Print '<script>alert("Please set up your profile");</script>'; 
			Print '<script>window.location.assign("setprofile.php");</script>'; 
		}

    pg_close($conn);

?>
