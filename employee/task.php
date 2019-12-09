<?php
include "../auth/auth.php";
include "authenitication.php";
?>
<html>
<head>
<title>Task</title>
<link rel="stylesheet "href="../css/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

</head>

<body>
  <?php include "header.php";?>
  <div class="container">
  	<h4>All Task List</h4>

  	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sl.No</th>
      <th>Task</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=1;
$query="SELECT * FROM task WHERE `user_id`='".$_SESSION['user_id']."'";
$res=mysqli_query($conn,$query);
$count=mysqli_num_rows($res);
if($count>0)
{
while($row=mysqli_fetch_array($res))
{
?>

    <tr class="info">
      <td><?php echo $i;?></td>
      <td><a  href="view_message.php?id=<?php echo $row['t_id'];?>"> <?php echo substr($row['task'],0,50);?></a></td>
      <td><?php echo $row['date_time'];?></td>
   
      <td><a class="btn btn-success" href="view_message.php?id=<?php echo $row['t_id'];?>">View</a></td>   </tr>
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

