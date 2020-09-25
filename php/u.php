<?php
require_once("database.php"); 
 $username = $_REQUEST["q"];
 function nvalidate($name)
	{
		if($name=="")
			return "Username Cannot be Empty.";
		if(strlen($name)<3)
			return "Username is TOO short.";
		if(strlen($name)>10)
			return "Username is TOO long.";

	}
 echo nvalidate($username);
 $sql = "Select * from users";
 $response = " "; 
	$query = pg_query($conn, $sql);
	while($row = pg_fetch_assoc($query))
	{
		$table_users = $row['username']; 
		if($username == $table_users) 
		{
            $response = "<span style='color: red;'>Already taken.</span>";
	    }
        
    }
    echo $response;
	die;
    
	
?>
