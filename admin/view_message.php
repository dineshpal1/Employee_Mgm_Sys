<?php
include "../auth/auth.php";
include "authenitication.php";
?>
<html>
<head>
<title>view_Message</title>
<link rel="stylesheet "href="../css/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

</head>

<body>
  <?php include "header.php";?>
  <div class="container">
<h3>Detail Message View</h3>
<?php 
 $m_id=$_GET['id'];
 $query="SELECT * FROM task WHERE `t_id`='".$m_id."'";
$res=mysqli_query($conn,$query);
$count=mysqli_num_rows($res);
$row=mysqli_fetch_array($res)


?>
<div class="col-sm-12" style="background-color: #f9f9f9; padding:15px;">

<?php echo $row['task'];?>
	</div>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	<div class="col-sm-12">
		<br>

		<?php
		if(isset($_REQUEST['m_reply']))
		{
			$m_id=$_POST['m_id'];
			$user_id=$_POST['user_id'];
			$reply=mysqli_real_escape_string($conn,$_POST['m_reply']);


			$query="INSERT INTO task_reply (reply,m_id,reply_by)VALUES('$reply','$m_id','$user_id')";

			$res=mysqli_query($conn,$query);

			if($res)
			{
				echo"Reply submitted";
			}
			else
			{
				echo"Error in reply  please try again!";
			}

		}


		?>



		<form action="" method="post" >
			<fieldset>
			<input type="hidden"name="m_id" value="<?php echo $m_id;?>">
			<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">

			<div class="form-group">
				<label for="input email" class="col-lg-2 control-label"><h6>&nbsp;</h6></label>
				<div class="col-lg-10">

			<textarea name="m_reply" rows="5"  style="width:100%;background-color: #d9d9d9; padding:5px;"></textarea>
		</div>
	</div>
			 <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
       
        <button type="submit" class="btn btn-primary">Submit Reply</button>

      </div>
    </div>
		</form>
	</div>
		<div class="col-sm-12">
		<fieldset>
			<p>&nbsp;</p>
			<div class="form-group">
				<label for="input email" class="col-lg-2 control-label"><h6><b>Your Reply:</b></h6></label>
				<div class="col-lg-10">
					<?php
					 $m_id=$_GET['id'];
	$query1="SELECT * FROM task_reply JOIN `users` ON `users`.`user_id`=`task_reply`.`reply_by` WHERE `m_id`='".$m_id."'";
						$res1=mysqli_query($conn,$query1);
						$count1=mysqli_num_rows($res1);
						while($row1=mysqli_fetch_array($res1))
						{
						?>

					<div class="col-sm-12" style="background-color: #f9f9f9; padding:15px;">

				<?php echo $row1['name'].":-".$row1['reply'];?>
					</div>



					<?php } ?>

				</div>
			</div>
			</fieldset>
		</div>
	</div>
</div>
</body>
</html>

