<?php
include("db.php");
session_start();

$uName = $_POST['username'];
$pWord = $_POST['password'];

$qry = "SELECT * FROM user WHERE regusername='".$uName."' and regpassword='".$pWord."'";
$res = mysqli_query($conn,$qry) or die("could not execute");
$num_row = mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);

if( $num_row == 1 ) {
	echo 'true';
    $_SESSION['uname']=$row['regusername'];
	header('location:chat.php');
}
else {
	echo 'Username not found!!!';
	header('location:index.php');
}
?>