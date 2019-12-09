<?php
include "../auth/auth.php";
include "authenitication.php";
?>
<html>
<head>
<title>Edit User Details</title>
<link rel="stylesheet "href="../css/style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script>
function formvalidation(){
var name=$('#inputName').val();
var email=$('#inputEmail').val();
var password=$('#inputPassword').val();
var passlength=$('#inputPassword').val().length;


if(name=='')
{
  alert("please enter your name");
  return false;
}
if(email=='')
{
  alert("please enter your email");
  return false;
}
if(password=='')
{
  alert("please enter your password");
  return false;
}
if (passlength<=4)
{
alert("please enter minimum five digit password");
return false;
}

}

  </script>
</head>

<body>
  <!-------including header file------------------------->
<?php include "header.php";?>
  <div class="container">

<div class="col-xs-6 col-xs-push-3 well">
  <!----------------------register form start from here----------------------->
<form class="form-horizontal" action="update_user.php" method="post" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Edit User Deatails</legend>
    <?php
    if(isset($_SESSION['success']))
    {
      echo $_SESSION['success'];
     unset($_SESSION['success']);
    }

    ?>
    <?php 
    //here we get the userid 
    $user_id=$_GET['id'];
    $query="SELECT * FROM users WHERE user_id='$user_id'";
    $res=mysqli_query($conn,$query);
    $data=mysqli_fetch_array($res);


    ?>
    <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">NAME</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" value="<?php echo $data['name'];?>">
      </div>
    </div>


    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" value="<?php echo $data['email'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" >
        
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label">Departments</label>
      <div class="col-lg-10">

        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="Admin" <?php if ($data['department']=='Admin'){ echo "checked";} ?> >
            Admin
          </label>
        </div>
        

        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="Web Development" <?php if ($data['department']=='web development'){ echo "checked";} ?> >
            Web Development
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="SEO" <?php if ($data['department']=='SEO'){ echo "checked";} ?>>
            SEO
          </label>
        </div>
      </div>
    </div>
   

<div class="form-group">
      <label class="col-lg-2 control-label">Role</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="admin" <?php if ($data['role']=='admin'){ echo "checked";} ?> >
            Admin
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="employee" <?php if ($data['role']=='employee'){ echo "checked";} ?>>
            Employee
          </label>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </fieldset>
</form>
<!------------------register form end here----------------------------->
</div>
</div>
</body>
</html>