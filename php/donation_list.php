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
			$sql = "SELECT * FROM donation";
			$result = pg_query($conn,$sql);
            $exists = pg_num_rows($result); 
			if ($exists > 0){
				?>
				<h2>Donation</h2>
				<table border="1" class="userlist">
					<tr>
						<th>Donation_ID</th>
						<th>First_name</th>
                        <th>Last_name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Comment</th>
                    </tr>
				<?php
				while($row = pg_fetch_assoc($result)) {
					?>
					<tr>
                        <td><?php echo $row["donation_id"]; ?></td>
                        <td><?php echo $row["first_name"]; ?></td>
                        <td><?php echo $row["last_name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["mobile_no"]; ?></td>
						<td><?php echo $row["amount_status"]; ?></td>
						<td><?php echo $row["amount"]; ?></td>
						<td><?php echo $row["comment"];?></td>
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