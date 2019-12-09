
<?php
session_start();
include "authenitication.php";
$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
	die("not connected to database");
}


//insert query for register page
if(isset($_REQUEST['leave_from']))
{
	 $leave_from=$_POST['leave_from'];
	 $leave_to=$_POST['leave_to'];
	 $eleave=$_POST['eleave'];
	 $mleave=$_POST['mleave'];
	 $cleave=$_POST['cleave'];
	 $apply_by=$_POST['user_id'];
	 $status="pending";
	 
	 
 $query="INSERT INTO `applied_leave`
 (`leave_from`,`leave_to`,`e_leave`,`m_leave`,`c_leave`,`apply_by`,`status`)VALUES('$leave_from','$leave_to','$eleave','$mleave','$cleave','$apply_by','$status')";
$res=mysqli_query($conn,$query);
if($res)
{
	
$_SESSION['success']="leave applied successfully";
	header('Location:leave.php');
	
}
else
{
	echo"No leave assigned,Please try after few days!";
}
}

?>







