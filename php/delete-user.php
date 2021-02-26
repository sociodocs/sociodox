<?php

include 'database.php'; 

if (isset($_GET['user']) && ($_GET['user'] != "")) {
    $deleteuser = $_GET['user'];

	$sql = "DELETE FROM users WHERE username ='$deleteuser'";
	$query = pg_query($conn, $sql);
	header("Location: user_list.php");
}

?>
