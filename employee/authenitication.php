<?php

$role=$_SESSION['role'];
if ($role=='admin')
	{
	//echo"login success";
	header('Location:../admin/dashboard.php');

	//$_SESSION['success']="redirected to dashboard";
	}






?>