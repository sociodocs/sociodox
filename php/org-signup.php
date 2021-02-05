<?php

//Sign Up Aditya
require_once("database.php"); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
$org_name = $_POST["org_name"];
$org_type = $_POST["org_type"];
$org_category = $_POST["org_category"];
$org_email = $_POST["email"];
if(filter_var($org_email,FILTER_VALIDATE_EMAIL)){
    $email =$org_email;
}
$mobile_no = $_POST["mobile_no"];
$org_address = $_POST["org_address"];
$org_password = $_POST["org_password"];


$hash = password_hash("$org_password", PASSWORD_DEFAULT);

    $bool = true;

	$sql = "Select * from organization"; 
	$query = pg_query($conn, $sql);
	while($row = pg_fetch_assoc($query))
	{
		$table_org_name = $row['org_name']; 
		if($org_name == $table_org_name) 
		{
			$bool = false; 
			Print '<script>alert("org_name has been taken!");</script>';
			Print '<script>window.location.assign("../index.html");</script>';
		}
	}

	if($bool) 
	{   
		
		$sql1 = "INSERT INTO organization VALUES(default,'$org_name','$org_type','$org_category','$email','$mobile_no','$org_address','$hash',CURRENT_TIMESTAMP)";
		
		
		$result = pg_query($conn,$sql1) or die("could");
		if($result){
			Print '<script>alert("Successfully Created! Please Login ");</script>'; 
		    Print '<script>window.location.assign("../index.html");</script>'; 
            }
		 else {
			 echo "error";
		 }
		

     }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create Your Organization</title>    
</head>
    <body>
        <form method="POST" action="org-signup.php" enctype="multipart/form-data">
            <div>Organization Name</div>                        
            <input type="text" id="pfn" name="org_name" placeholder="" required/>
            <div>Organization Type</div>                        
            <input type="text" id="pfn" name="org_type" placeholder="" required/>
            <div>Organization category</div>                        
            <input type="text" id="pfn" name="org_category" placeholder="" required/>
            <div>Organization Email</div>                        
            <input type="email" id="pfn" name="email" placeholder="" required/>
            <div>Organization Mobile NO</div>                        
            <input type="mobile" id="pfn" name="mobile_no" placeholder="" required/>
            <div>Organization Address</div>                        
            <input type="text" id="pfn" name="org_address" placeholder="" required/>
            <div>Organization Password</div>                        
            <input type="password" id="pfn" name="org_password" placeholder="" required/>                    
            <input type="submit" name="submit" value="Create"/>
        </form>               
    </body>
</html>