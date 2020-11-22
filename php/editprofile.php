<?php
	//edit profile form  By Aditya
	if(isset($_POST['submit'])){
        session_start();
        require_once("database.php"); 
        if($_POST['first_name']!=""){
            $first_name = $_POST["first_name"];
        }else{
            $first_name =$_SESSION['first_name'];
        }
        
        if($_POST['last_name']!=""){
            $last_name = $_POST["last_name"];
        }else{
            $last_name =$_SESSION['last_name'];
        }
        
        if($_POST['email']!=""){
            $email = $_POST["email"];
        }else{
            $email =$_SESSION['email'];
        }
        
        if($_POST['mobile_no']!=""){
            $mobile  = $_POST["mobile_no"];
        }else{
            $mobile =$_SESSION['mobile_no'];
        }

        if($_FILES['p']['name']!=""){
            $filename = ($_FILES['p']['name']);
            echo $filename;
        }else{
            $filename ="";
        }        
        echo "$first_name";
        echo "$last_name";
        echo "$email";
        echo $mobile;        
        echo $filename;

	    if($filename != "") {
         
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
         }else{
            $profileimage="";	
         }
    
        echo "<br>";
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "email is valid";
        }
        else{
            Print '<script>alert("Invalid email ! Please Enter again.");</script>'; 
            Print '<script>window.location.assign("profile.php");</script>'; 
        
        }
        $username = $_SESSION['username'];
        $qrys="UPDATE users SET email='$email',
                                mobile_no='$mobile'
                                WHERE username='$username'";
        $results= pg_query($conn,$qrys);        
        if($profileimage != "") {
        $sql1 = "UPDATE profile SET first_name='$first_name',
                                    last_name='$last_name',
                                    email='$email',
                                    mobile_no='$mobile',
                                    dp='$profileimage'                                    
                                    where username='$username'";
        }else{            
        $sql1 = "UPDATE profile SET first_name='$first_name',
                                    last_name='$last_name',
                                    email='$email',
                                    mobile_no='$mobile'                                                                        
                                    where username='$username'";
        }                                    
        $result = pg_query($conn,$sql1) or die("could");
        $sql2 = pg_query($conn,"select * from profile where username='$username'") or die("could");
            if($sql2){
                while($row = pg_fetch_assoc($sql2))
                {
                    $_SESSION['first_name'] = $row['first_name']; 
                    $_SESSION['last_name'] = $row['last_name']; 
                    $_SESSION['email'] = $row['email']; 
                    $_SESSION['mobile_no'] = $row['mobile_no']; 
                    $_SESSION['dp'] = $row['dp']; 
                    $_SESSION['username']=$row['username'];
                }
            }

        
            if($result){
                Print '<script>alert("Successfully edited the profile.");</script>'; 
                Print '<script>window.location.assign("profile.php");</script>'; 
                }
            else {
                echo "error";
                }
        

        pg_close($conn);		 

    }

?>