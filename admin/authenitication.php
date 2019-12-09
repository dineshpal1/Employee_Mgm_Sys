<?php

$role=$_SESSION['role'];
if ($role=='employee')
	{
	//echo"login success";
	header('Location:../employee/dashboard.php');

	//$_SESSION['success']="redirected to dashboard";
	}





?>