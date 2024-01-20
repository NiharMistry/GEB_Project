<html>
<head>
  <?php
    include("csslink.php");
  ?>
  
  <?php
  $contactid="";
	$contactdate="";
	$personname="";
	$contactno="";
	$emailid="";
  $discritpion="";
  $query="";
	$conn="";
	$msg="";
	$result="";
  ?>
  
  <?php
    $conn=mysqli_connect('localhost','root','','gebdata');
    if(isset($_POST['btnsubmit']))
	{
	   $contactdate=date('y-m-d');	
	   $personname=$_POST['personname'];
	   $contactno=$_POST['contactno'];
	   $emailid=$_POST['emailid'];
	   $description=$_POST['description'];
	   $query="insert into contact(contactdate,personname,contactno,emailid,description) values('$contactdate','$personname','$contactno','$emailid','$description')";
	   $result=mysqli_query($conn,$query);
	   if($result)
	   {
        $msg="We will get you in touch through your contact no. or email within 24 hours from now.";
	     //header('location:login.php');
	   }
	   else
	   {
        $msg="Not registered";
	     //$msg="Register not saved...";
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
                    <h2>Contact Us</h2>  
                 </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="personname" class="form-control" id="name" placeholder="Enter Your Name" required>
                  </div>
                  <div class="form-group mt-3">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="contactno" id="ctn" placeholder="Enter Your Contact Number" required>
                  </div>
        				  <div class="form-group mt-3">
                    <label>Email ID</label>
                    <input type="email" class="form-control" name="emailid" id="email" placeholder="Enter Email Address" required>
                  </div>
                  <div class="form-group mt-3">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter The Topic Of Query" required>
                  </div>
				  
                  <div class="form-group mt-3">
                   <button class="btn btn-success"  name="btnsubmit" type="submit">Submit</button>
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
