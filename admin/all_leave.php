<?php
include "../auth/auth.php";
include "authenitication.php";
?>
<html>
<head>
<title>Leave</title>
<link rel="stylesheet "href="../css/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

</head>

<body>
  <?php include "header.php";?>
  <div class="container">
    <h4><font color="Blue">All Employee Leave List</font></h4>

    <table class="table table-striped table-hover bg-primary text-white ">
  <thead>
    <tr>
      <th>Sl.No</th>
      <th>Employee Name</th>
      <th>Earning Leave</th>
      <th>Medical Leave</th>
      <th>Casual Leave</th>
      <th>Valid_From</th>
      <th>Valid_To</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=1;
$query="SELECT * FROM `assign_leave` t1 join `users` t2 ON t1.assign_to=t2.user_id";
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
      <td><?php echo $row['e_leave'];?></td>
      <td><?php echo $row['m_leave'];?></td>
      <td><?php echo $row['c_leave'];?></td>
      <td><?php echo $row['v_from'];?></td>
      <td><?php echo $row['v_to'];?></td>
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

