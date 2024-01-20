<html>
<head>
  <?php
    session_start();  
    include("csslink.php");
  ?>
  
  <?php
    $regid="";
	$username="";
	$password="";
	$usertype="";
	$query="";
	$conn="";
	$msg="";
	$result="";
  ?>
  
  <?php
  
    $conn=mysqli_connect('localhost','root','','gebdata');
	
    if(isset($_POST['btnlogin']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
	    $query="select regid,username,password,usertype from register where username='$username'";
	    $tb=mysqli_query($conn,$query);
		$rw=mysqli_fetch_array($tb);
		if($rw)
		{
		  if($password==$rw['password'])
		  {
			  $_SESSION['regid']=$rw['regid'];
			  $_SESSION['username']=$rw['username'];
			  if($rw['usertype']=='Admin')
		      {
			    header('location:../admin/adminhome.php');
			  }
			  if($rw['usertype']=='Consumer')
		      {
			    header('location:../consumer/consumerhome.php');
			  }
			  $msg="Login Successfully....";
		  }
		  else
		  {
		    $msg="Invalid Password";
		  }
		}
		else
		{
		    $msg="Invalid User Name";
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
     <div class="col-md-4">  </div>
      <div class="col-md-4">
                 <div class="form-group text-center">
                    <h2>USER LOGIN</h2>  
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
                   <button class="btn btn-success"  name="btnlogin" type="submit">Login</button>
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
