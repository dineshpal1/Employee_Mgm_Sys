
<?php
session_start();
include "authenitication.php";
$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
  die("not connected to database");
}
//insert query for update_user page
if(isset($_REQUEST['email']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $user_id=$_POST['user_id'];
  $pass=$_POST['password'];
  $depart=$_POST['depart'];
  $role=$_POST['role'];

if ($pass==' ')
{

 $query="UPDATE `users` SET
`name`='$name',`email`='$email',`department`='$depart',`role`='$role' WHERE `user_id`='$user_id' ";

}
else
{

 $query="UPDATE `users` SET
`name`='$name',`email`='$email',`password`='$pass',`department`='$depart',`role`='$role' WHERE `user_id`='$user_id'";
}
$res=mysqli_query($conn,$query);

if($res)
{
$_SESSION['success']="data updated successfully";
  header('Location:dashboard.php');
}
else
{
  echo"Data not updated,Please try again!";
}
}


?>

