<?php
session_start();

$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
	die("not connected to database");
}

if (! isset($_SESSION['auth']))
{

	header('Location:../login.php');
}

?>