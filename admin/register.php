<?php
session_start();
include "authenitication.php";
?>
<html>
<head>
<title>Register</title>
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
<!---------including header file here---------------------------->
<?php include "header.php";?>

  <div class="container">

<div class="col-xs-6 col-xs-push-3 well">
  <!----------------------register form start from here----------------------->
<form class="form-horizontal" action="insert_user.php" method="post" onsubmit="return formvalidation();">
  <fieldset>
    <legend>REGISTER</legend>
    <?php
    if(isset($_SESSION['success']))
    {
      echo $_SESSION['success'];
     unset($_SESSION['success']);
    }

    ?>
    

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">NAME</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
      </div>
    </div>


    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
        
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label">Departments</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="Web Development" checked="">
            Web Development
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="SEO">
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
            <input type="radio" name="role" id="role" value="admin" checked="">
            Admin
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="employee">
            Employee
          </label>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
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