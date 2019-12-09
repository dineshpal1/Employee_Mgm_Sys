<?php
include "../auth/auth.php";
include "authenitication.php";
?>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet "href="../css/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

</head>

<body>
  <?php include "header.php";?>
  <div class="container">
<?php echo"<h5>Welcome to the admin dashboard</h5>";?>
<h3> USER RECORDS</h3>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sl.No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Deapartment</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=1;
$query="SELECT * FROM users ";
$res=mysqli_query($conn,$query);
$count=mysqli_num_rows($res);
if($count>0)
{
while($row=mysqli_fetch_array($res))
{
?>

    <tr class="info">
      <td><?php echo $i;?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['department'];?></td>
      <td><?php echo $row['role'];?></td>
      <td><a class="btn btn-primary" href="edit_user.php?id=<?php echo $row['user_id'];?>">Edit</a>|<a class="btn btn-danger" href="delete_user.php?id=<?php echo $row['user_id'];?>">Delete</td>
    </tr>
<?php 
$i++;
}}
else
{
	echo"No data found";
} 
?>
  </tbody>
</table> 

</div>
</body>
</html>

