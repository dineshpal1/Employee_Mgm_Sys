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
  	<h4> Leave List <a href="applied_leave.php" class="btn btn-success" style="margin-left:18px; ">All Applied Leave</a></h4>

    <table class="table table-striped table-hover bg-primary text-white ">
  <thead>
    <tr>
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
$user_id=$_SESSION['user_id'];
$query="SELECT * FROM `assign_leave` t1 join `users` t2 ON t1.assign_to=t2.user_id WHERE t2.user_id=$user_id";
$res=mysqli_query($conn,$query);
$count=mysqli_num_rows($res);
if($count>0)
{
while($row=mysqli_fetch_array($res))
{
?>

    <tr class="info">
      
      <td><?php echo $row['name'];?></td>
      <td class="eleave"><?php echo $row['e_leave'];?></td>
      <td class="mleave"><?php echo $row['m_leave'];?></td>
      <td class="cleave"><?php echo $row['c_leave'];?></td>
      <td class="v_from"><?php echo $row['v_from'];?></td>
      <td class="v_to"><?php echo $row['v_to'];?></td>
         </tr>
<?php 

}}
else
{
  echo"No data found";
} 
?>
  </tbody>
</table> 
<div class="col-xs-6 col-xs-push-3 well">
<form class="form-horizontal" action="apply_leave.php" method="post" >
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
  <fieldset>
    <legend>Apply for Leave</legend>
    <p>
      <?php
      if(isset($_SESSION['success'] ))
      {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
      }

    ?>
      
    </p>
   
    <!---------------------Left box-------------------------------->
<!-------------Right box---------------------------------------------->
<div class="col-xs-9">
  
      <div class="form-group">
      <label for="leave_from" class="col-lg-3 "><b>Leave From:</b></label>
      <div class="col-lg-9">
        <input type="date" name="leave_from" class="form-control" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
      </div>
    </div>

       <div class="form-group">
      <label for="valid_to" class="col-lg-3 "><b>Leave To:</b></label>
      <div class="col-lg-9">
        <input type="date" name="leave_to" class="form-control" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
      </div>
    </div>

       <div class="form-group">
      <label for="eleave" class="col-lg-3 "><b>Earning Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" name="eleave" class="form-control" placeholder="No of Leave" onblur="checkeleavequan(this.value)">
      </div>
    </div>

 <div class="form-group">
      <label for="mleave" class="col-lg-3 "><b>Medical Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" name="mleave" placeholder="No of leave" class="form-control" onblur="checkmleavequan(this.value)">
      </div>
    </div>



     <div class="form-group">
      <label for="cleave" class="col-lg-3 "><b>Casual Leave:</b></label>
      <div class="col-lg-9">
        <input class="form-control" type="text" name="cleave" placeholder="No of Leave" onblur="checkcleavequan(this.value)">
      </div>
    </div>
</div>

       <div class="form-group">
      <div class="col-lg-12 ">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


</div>
</div>
<script >
  function checkDate(str){
    var vfrom=$(".v_from").text();
    var vto=$(".v_to").text();
    var lfrom=str;
    var date1=new Date(vfrom);
    var date2=new Date(lfrom);
    var diffDays=parseInt((date2-date1)/(1000 * 3600 * 24));
   // alert(diffDays);
   var date3=new Date(lfrom);
    var date4=new Date(vto);
    var diffDays2=parseInt((date4-date3)/(1000 * 3600 * 24));
   // alert(diffDays2);
   if (diffDays>=0 && diffDays2>=0)
   {
         return true;  
   }
   else
   {
    alert("Please check the valid to and valid from date then enter correct date");
    return false;
   }
  }

  function checkeleavequan(str){
     var vfrom=$(".eleave").text();
    
    var lqty=str;
    if(vfrom>=lqty)
    {
      return true;
    }
    else
    {
      alert('please enter valid Earning leave quantity');
      return false;
    }

 }

  function checkmleavequan(str){
     var vfrom=$(".mleave").text();
    
    var lqty=str;
    if(vfrom>=lqty)
    {
     return true; 
    }
    else
    {
      alert('please enter valid Medical leave quantity');
      return false;
    }

 }

  function checkcleavequan(str){
     var vfrom=$(".cleave").text();
    
    var lqty=str;
    if(vfrom>=lqty)
    {
      return true;
    }
    else
    {
      alert('please enter valid Casual leave quantity');
      return false;
    }

 }
</script>
</body>
</html>

