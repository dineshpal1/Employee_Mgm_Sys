<?php
session_start();
$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
	die("not connected to database");
}


//insert query for register page
if(isset($_REQUEST['email']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$depart=$_POST['depart'];
	$role=$_POST['role'];

$query="INSERT INTO `users`(`name`,`email`,`password`,`department`,`role`) VALUES('$name','$email','$pass','$depart','$role')";
$res=mysqli_query($conn,$query);

if($res)
{
$_SESSION['success']="data inserted successfully";
	header('Location:register.php');
}
else
{
	echo"Data not inserted,Please try again!";
}
}



?>