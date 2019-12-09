<?php
session_start();
include "authenitication.php";
$conn=mysqli_connect('localhost','root','','ems');
if(!$conn)
{
  die("not connected to database");
}

?>
<html>
<head>
<title>Assign Employee Leave</title>
<link rel="stylesheet "href="../css/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

</head>

<body>
<!---------including header file here---------------------------->
<?php include "header.php";?>

  <div class="container">

<div class="col-xs-10 col-xs-push-1 well">
 <?php
    if(isset($_SESSION['success']))
    {
      echo $_SESSION['success'];
     unset($_SESSION['success']);
    }

    ?>
  
  <!----------------------register form start from here----------------------->
<form class="form-horizontal" action="insert_leave.php" method="post" >
  <fieldset>
    <legend>Assign Leave<a href="all_leave.php" class="btn btn-primary" style="margin-left:18px; ">ALL Leave</a><a href="all_applied_leave.php" class="btn btn-success" style="margin-left:18px; ">ALL Applied Leave</a></legend>
   
    <!---------------------Left box-------------------------------->
<div class="col-xs-3" style="background-color: #d9d9d9;padding: 15px;">
 <div class="form-group">
      <label class="col-lg-12 "><b>Employee List</b></label>
      <input type="hidden" name="assigned_by" value="<?php echo $_SESSION['user_id'];?>">

      <div class="col-lg-12">
        <?php
        
        $query="SELECT  *  FROM users WHERE `role`='employee' order by user_id DESC";
        $res=mysqli_query($conn,$query);
        $count=mysqli_num_rows($res);
        
          while($row=mysqli_fetch_array($res))
          {

          ?>


        <div class="checkbox">
          <label>
            <input type="checkbox" name="emp[]"  value="<?php echo $row['user_id'];?>" >
            <?php echo $row['name'];?>
          </label>
        </div>
      <?php }?>

      </div>
    </div>
   
</div>
<!-------------Right box---------------------------------------------->
<div class="col-xs-9">
   <div class="form-group">
      <label for="inputEmail" class="col-lg-3 "><b>Valid From:</b></label>
      <div class="col-lg-9">
        <input type="date" name="valid_from" class="form-control" placeholder="dd/mm/yyyy">
      </div>
    </div>

       <div class="form-group">
      <label for="inputEmail" class="col-lg-3 "><b>Valid To:</b></label>
      <div class="col-lg-9">
        <input type="date" name="valid_to" class="form-control" placeholder="dd/mm/yyyy">
      </div>
    </div>


       <div class="form-group">
      <label for="inputEmail" class="col-lg-3 "><b>Earning Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" name="eleave" class="form-control" placeholder="No of Leave">
      </div>
    </div>

 <div class="form-group">
      <label for="inputEmail" class="col-lg-3 "><b>Medical Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" name="mleave" placeholder="No of leave" class="form-control">
      </div>
    </div>

     <div class="form-group">
      <label for="inputEmail" class="col-lg-3 "><b>Casual Leave:</b></label>
      <div class="col-lg-9">
        <input class="form-control" type="text" name="cleave" placeholder="No of Leave">
      </div>
    </div>

</div>


       <div class="form-group">
      <div class="col-lg-12 col-lg-offset-3">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
<!------------------register form end here----------------------------->
</div>
</div>
</body>
</html>