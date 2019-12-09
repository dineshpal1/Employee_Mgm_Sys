<?php
session_start();
include "authenitication.php";
$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
	die("not connected to database");
}


//insert query for register page
if(isset($_REQUEST['valid_from']))
{
	 $valid_from=$_POST['valid_from'];
	 $valid_to=$_POST['valid_to'];
	 $eleave=$_POST['eleave'];
	 $mleave=$_POST['mleave'];
	 $cleave=$_POST['cleave'];
	 $assigned_by=$_POST['assigned_by'];
	 
	  $emplist=$_POST['emp'];
	 // print_r($emplist);
	  foreach($emplist as $emp)
	  {
	
 $query="INSERT INTO `assign_leave`(`v_from`,`v_to`,`e_leave`,`m_leave`,`c_leave`,`assign_to`,`assign_by`)VALUES('$valid_from','$valid_to','$eleave','$mleave','$cleave','$emp','$assigned_by')";
$res=mysqli_query($conn,$query);



}

if($res)
{
	
$_SESSION['success']="leave assigned successfully";
	header('Location:assign_leave.php');
	
}
else
{
	echo"No leave assigned,Please try after few days!";
}
}

?>