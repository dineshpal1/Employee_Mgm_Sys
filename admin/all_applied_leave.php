<?php
include "../auth/auth.php";
include "authenitication.php";
?>
<html>
<head>
<title>All Applied Leave</title>
<link rel="stylesheet "href="../css/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

</head>

<body>
  <?php include "header.php";?>
<?php
if(isset($_POST['approved']))
{
  $status="Approved";
  $comment=$_POST['comment'];
  $id=$_POST['id'];


//Update for all_applied page
  
 $query="UPDATE `applied_leave`SET `status`='$status',`comment`='$comment' WHERE `id`='$id'";
$res=mysqli_query($conn,$query);



if($res)
{
  
$_SESSION['success']="Row Updated successfully";
  
  
}
else
{
  echo"No Data updated !";
}
}


if(isset($_POST['rejected']))
{
  $status="Rejected";
  $comment=$_POST['comment'];
  $id=$_POST['id'];

  $query="UPDATE `applied_leave` SET `status`='$status',`comment`='$comment' WHERE `id`='$id'";
$res=mysqli_query($conn,$query);



if($res)
{
  
$_SESSION['success']="Row Updated successfully";
  
  
}
else
{
  echo"No Data updated !";
}
}

?>

  <div class="container">
    <h4><font color="Blue">All Applied Leave List</font></h4>
    <?php 
    if(isset($_SESSION['success']))
    {
      echo $_SESSION['success'];
       unset($_SESSION['success']);

    }

    ?>
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
      <th>Status</th>
      <th>Comment</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=1;
$query="SELECT * FROM `applied_leave` t1 join `users` t2 ON t1.apply_by=t2.user_id";
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
      <td><?php echo $row['leave_from'];?></td>
      <td><?php echo $row['leave_to'];?></td>
      <td style="color:red;"><?php echo $row['status'];?></td>
      <td><form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
       <textarea name="comment"></textarea></td>
      <td>
        
        <button type="submit" name="approved" class="btn btn-success ">Approved</button>
          
          <button type="submit" name="rejected" class="btn btn-danger">Reject</button>
        </form></td>
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

