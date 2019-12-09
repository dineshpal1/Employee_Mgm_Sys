<?php
session_start();
include "authenitication.php";
$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
	die("not connected to database");
}


//delete query for delete page
$user_id=$_GET['id'];
//echo $user_id;

$query="DELETE FROM `users` WHERE `user_id`='$user_id'";
$res=mysqli_query($conn,$query);


if($res)
{
$_SESSION['success']="data deleted successfully";
	header('Location:dashboard.php');
}
else
{
	echo"Data not deleted,Please try again!";
}




?>