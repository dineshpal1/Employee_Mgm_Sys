<?php
session_start();
$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
	die("not connected to database");
}
//Login account process

if (isset($_POST['email']))
{
$email=$_POST['email'];
$pass=$_POST['password'];	
$query="SELECT * FROM users WHERE email='$email' && password='$pass'";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_array($res);
$count=mysqli_num_rows($res);
if ($count==1)
{
	$session_id=session_id();  //for generating session id
	$_SESSION['auth']=$session_id;
	//for generating user id
		//$_SESSION['user_id']=$row['role'];
	$_SESSION['user_id']=$row['user_id'];
	$_SESSION['role']=$row['role'];
	$role=$row['role'];
	if ($role=='admin')
	{
	//echo"login success";
	header('Location:admin/dashboard.php');

	//$_SESSION['success']="redirected to dashboard";
	}
elseif ($role='employee')
{
header('Location:employee/dashboard.php');


}
else
{
	//echo"login failed";
	$_SESSION['error']="wrong email or password !";
	header('Location:login.php');

}
}
}
?>