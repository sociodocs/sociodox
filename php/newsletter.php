<?php
    //Newletter By Aditya
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	require_once("database.php"); 
    $email = $_POST["email"];
    echo "<br>";
    echo "$email";
    echo "<br>";
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	    echo "email is valid";
  	}else{
		Print '<script>alert("Invalid email ! Please Enter again.");</script>'; 
		Print '<script>window.location.assign("../index.html");</script>'; 
	
    }
    
	$sql = "Select * from newsletter"; 
	$query = pg_query($conn, $sql);
	while($row = pg_fetch_assoc($query))
	{
		$table_email = $row['email']; 
		if($email == $table_email) 
		{
            
		Print '<script>alert("You have already subscribed!.");</script>'; 
		Print '<script>window.location.assign("../index.html");</script>'; 
		}
	}



    $sql1 = "INSERT INTO newsletter(email) values ('$email')";
    $result = pg_query($conn,$sql1) or die("could");
		if($result){
			Print '<script>alert("Thank You! For subscribing.");</script>'; 
		    Print '<script>window.location.assign("../index.html");</script>'; 
            }
		 else {
			 echo "error";
             }
             
             pg_close($conn);		

}
?>
    
