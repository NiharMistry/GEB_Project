<html>
<head>
  <?php
    include("csslink.php");
    include("../class/dataclass.php");
  ?>
  
  <?php
  $dc=new dataclass();
    $regid="";
	$regdate="";
	$username="";
	$password="";
	$usertype="";
	$emailid="";
  $contactno="";
    $query="";
	$conn="";
	$msg="";
	$result="";
  ?>
  
  <?php
  if(isset($_POST['btnregister']))
	{
     $regid=$dc->primarykey("select max(regid) from register");
	   $regdate=date('y-m-d');	
	   $username=$_POST['username'];
	   $password=$_POST['password'];
	   $usertype="Consumer";
	   $emailid=$_POST['emailid'];
     $contactno=$_POST['contactno'];
	   $query="insert into register(regid,regdate,username,password,usertype,emailid,contactno) values('$regid','$regdate','$username','$password','$usertype','$emailid','$contactno')";
	   $result=$dc->saverecord($query);
	   if($result)
	   {
       $query="insert into consumer(consumerid,consumername) values('$regid','$username')";
       $result=$dc->saverecord($query);
	     header('location:login.php');
	   }
	   else
	   {
	     $msg="Register not saved...";
	   }
	}
  ?>
  
  
</head>
<body>
<form name="frmreg" action="#" method="post">
<?php include("header.php") ?>
    
 <main id="main" style="margin-top:100px;margin-bottom:20px">

 <div class="container">
    <div class="row">
     <div class="col-md-3">  </div>
      <div class="col-md-6">
                 <div class="form-group text-center">
                    <h2>USER REGISTRATION</h2>  
                 </div>
                  <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" class="form-control" id="name" placeholder="Enter User Name" required>
                  </div>
                  <div class="form-group mt-3">
                    <label>Passsword</label>
                    <input type="password" class="form-control" name="password" id="pwd" required>
                  </div>
				         <div class="form-group mt-3">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Enter Email Address" required>
                  </div>

                  <div class="form-group mt-3">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="contactno"  placeholder="Enter contact number" required>
                  </div>
				  
                  <div class="form-group mt-3">
                   <button class="btn btn-success"  name="btnregister" type="submit">Register</button>
                   <button class="btn btn-danger" name="btncancel" type="submit">Cancel</button>
                  </div>
                  <div class="form-group">
                      <label><?php echo($msg); ?></label>
                  </div>  
    </div> 
    </div>  
</div>
</main>
    <?php include("footer.php") ?>
</form>

<?php include("jslink.php"); ?>
</body>
</html>
