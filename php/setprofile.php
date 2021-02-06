<?php
	//edit profile form  By Aditya
	if(isset($_POST['submit'])){
        session_start();
        require_once("database.php"); 
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $mobile  = $_POST["mobile_no"];
        $username = $_SESSION['username'];        
        $filename = ($_FILES['p']['name']);
        echo "$first_name";
        echo "$last_name";
        echo "$email";
        echo $mobile;
        echo $username;
        echo $filename;
        $target_file = "../profileimage/". basename($filename);            
			$uploadOk = 1;
			$fileuploaded=0;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		 	
   			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			    $uploadOk = 0;
			}
			if ($uploadOk == 1) {
    			if (move_uploaded_file($_FILES["p"]["tmp_name"], $target_file)) {
       		 		$fileuploaded=1;
    			} else {
       		 		$fileuploaded=0;
    			}
    		}
    		if($fileuploaded==1){
    			$profileimage=$target_file;
    		}
    		else{
    			$profileimage="";	
    		}
        echo "<br>";
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "email is valid";
        }
        else{
            Print '<script>alert("Invalid email ! Please Enter again.");</script>'; 
            Print '<script>window.location.assign("setprofile.php");</script>'; 
        
        }
        
        $sql1 = "INSERT INTO profile VALUES(default,'$first_name','$last_name','$email','$mobile','$profileimage','$username')";
        $result = pg_query($conn,$sql1) or die("could");
            if($result){
                Print '<script>alert("You have successfully setup the profile.");</script>'; 
                Print '<script>window.location.assign("profile.php");</script>'; 
                }
            else {
                echo "error";
                }
        
        $sql2 = pg_query($conn,"select * from profile where username='$username'") or die("could");
            if($sql2){
                while($row = pg_fetch_assoc($sql2))
                {
                    $_SESSION['first_name'] = $row['first_name']; 
                    $_SESSION['last_name'] = $row['last_name']; 
                    $_SESSION['email'] = $row['email']; 
                    $_SESSION['mobile_no'] = $row['mobile_no']; 
                    $_SESSION['dp'] = $row['dp']; 
                }
            }
            
        $qrys="UPDATE users SET username='$username',
                                email='$email',
                                mobile_no='$mobile'
                                WHERE username='$username'";
        $results= pg_query($conn,$qrys);  
        pg_close($conn);		 

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set-up-Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
    <body>
        <form method="POST" action="setprofile.php" enctype="multipart/form-data">
            <div id="ep"><input type="file" name="p" id="p"></div>
            <div id="row1">
                <div>First Name</div>
                <div>Last Name</div>
            </div>
            <div id="row2">
                <div><input type="text" id="pfn" name="first_name" placeholder="" required/></div>                
                <div><input type="text" id="pln" name="last_name" placeholder="" required/></div>
            </div>
            <div id="row3">
                <div>Email</div>
                <div>Mobile</div>
            </div>
            <div id="row4">
                <div><input type="text" id="pemail" name="email" placeholder="" required/></div>
                <div><input type="text" id="pmobile" name="mobile_no" placeholder="" required/></div>
            </div>
            <!-- <div id="row5">
                <div>Username</div>
            </div> -->
            <!-- <div id="row6">
                <div><input type="text" id="pusername" placeholder="" name="username" required ></div>
            </div> -->
            <div id="row8"><input type="submit" name="submit" value="Save"/></div>             
        </form>               
    </body>
</html>