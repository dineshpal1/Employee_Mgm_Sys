<?php
session_start();
include "authenitication.php";
$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
	die("not connected to database");
}


//insert query for register page
if(isset($_REQUEST['message']))
{
	 $message=mysqli_real_escape_string($conn,$_POST['message']);
	  $assigned_by=$_POST['assigned_by'];
	 
	  $emplist=$_POST['emp'];
	 // print_r($emplist);
	  foreach($emplist as $emp)
	  {
	
$query="INSERT INTO `task`(`task`,`user_id`,`assigned_by`)VALUES('$message','$emp','$assigned_by')";
$res=mysqli_query($conn,$query);



}

if($res)
{
$_SESSION['success']="Message inserted successfully";
	header('Location:task.php');
}
else
{
	echo"Message not inserted,Please try again!";
}
}

?>