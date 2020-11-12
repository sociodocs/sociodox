<!DOCTYPE html>
    <head>
		<title>User Details</title>
		<link rel="stylesheet" href="css/style.css"/>
		
	</head>
 <body>
			<?php 
			include("database.php");
			include("adminheader1.php"); 
		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ 			 
			$sql = "SELECT * FROM users";
			$result = pg_query($conn,$sql);
            $exists = pg_num_rows($result); 
			if ($exists > 0){
				?>
				<h2>Users</h2>
				<table border="1" class="userlist">
					<tr>
						<th>Username</th>
						<th>Email</th>
                        <th>Mobile No</th>
						<th>Password</th>
						<th>Update</th>
					</tr>
				<?php
				while($row = pg_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row["username"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["mobile_no"]; ?></td>
						<td><?php echo $row["password"];?></td>
						<td>
							<div><a href="edit-user.php?user=<?php echo $row["username"];?>" class="btn">Edit</a></div>
							<div><a href="delete-user.php?user=<?php echo $row["username"];?>" class="btn">Delete</a></div>
						</td>
					</tr>
					<?php
				      }
				    ?>
				</table>
                <?php 
            }
        }
    
            else {
			echo "No data found";
			}
          ?>
	</body>
</html>