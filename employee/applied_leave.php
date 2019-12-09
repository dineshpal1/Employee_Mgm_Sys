<?php
include "../auth/auth.php";
include "authenitication.php";
?>
<html>
<head>
<title>Applied Leave</title>
<link rel="stylesheet "href="../css/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

</head>

<body>
  <?php include "header.php";?>
  <div class="container">
  	<h4>All Applied  Leave Status </h4>
    <a class="btn btn-success "href="generate_leave_pdf.php" style="margin-bottom: 10px;">Download leave PDF</a>

    <table class="table table-striped table-hover bg-primary text-white ">
  <thead>
    <tr>
      <th>Sl.No.</th>
      
     <th>Earning Leave</th>
      <th>Medical Leave</th>
      <th>Casual Leave</th>
      <th>Leave_From</th>
      <th>Leave_To</th>
      <th>Status</th>
      <th>Comment</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=1;
$user_id=$_SESSION['user_id'];
$query="SELECT * FROM `applied_leave` WHERE `apply_by`=$user_id";
$res=mysqli_query($conn,$query);
$count=mysqli_num_rows($res);
if($count>0)
{
while($row=mysqli_fetch_array($res))
{
?>

    <tr class="info">
      <td><?php echo $i;?></td> 
       <td ><?php echo $row['e_leave'];?></td>
      <td ><?php echo $row['m_leave'];?></td>
       <td ><?php echo $row['c_leave'];?></td>
      <td><?php echo $row['leave_from'];?></td>
      <td><?php echo $row['leave_to'];?></td>
     <td style="color:red;"><?php echo $row['status'];?></td>
     <td style="color:blue;"><?php echo $row['comment'];?></td>
      
     
   
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

