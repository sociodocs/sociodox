<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pwd = '';   
    $database = 'sociochat';

    $conn = mysqli_connect($db_host, $db_user, $db_pwd);
    if (!$conn)
        die("can't Connect to Database");

    if (!mysqli_select_db($conn, $database))
        die("can't Select Database");
?>
