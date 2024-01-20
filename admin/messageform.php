<html>
<head>
<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
    $msgid="";
    $msgdate="";
	$mobileno="";
	$message="";
	$msg="";
	$dc=new DataClass();
  ?>
  <?php
  
   if(isset($_POST['btnsend']))
   {   
	  $msgdate=date('y-m-d');
	  $mobileno=$_POST['txtmobileno'];
	  $message=$_POST['txtmessage'];
	  $query="insert into message(msgdate,mobileno,message) values('$msgdate','$mobileno','$message')";
	  echo($query);
      $result=$dc->saveRecord($query);
	  if($result)
	  {
	    $msg="Message Send Successfully..";
		
	  }
	  else
	  {
	    $msg="Message not sent..";
	  }
	}
	
	if(isset($_POST['btncancel']))
	{
	   header('location:adminhome.php');
	}	
  ?>

</head>
<body>
<form name="frm" action="#"  method="post">  
<div class="container-scroller">
    <?php include("nav.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row" style="margin-bottom:20px" >
		     <div class="col-md-2"></div>
              <div class="col-md-8"><h3>Send Message</h3></div>
		    </div>
			
		     <div class="row" >
			  <div class="col-md-2"> </div>
               <div class="col-md-8 panel1"> 
			   
			      <div class="form-group">
                    <label>Mobile No</label>
                      <input type="text" class="form-control" name="txtmobileno" value="" placeholder="Enter Mobile No" autofocus onchange='checkmobileno(this,lblmobno)'>
                      <label class='errmsg' id="lblmobno"></label>
        		   </div>
				   
                  <div class="form-group">
                     <label>Message</label>
					 <textarea class="form-control" name="txtmessage" rows="3" > </textarea>
				   </div>
                    
				   <div class="form-group">
                       <input type="submit" class="btn btn-success" name="btnsend" value="Send">
					   <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
                   </div>
				</div>
			
			 </div>
			 
			  <div class="row" >
			   <div class="col-md-2"> </div>
			   <div class="col-md-8"> 				
				 <div class="form-group"> <label> <?php echo($msg) ?><label> </div>
			   </div>
			 </div>	
				 
        </div>
        <?php include("footer.php"); ?>
    </div>   
  </div>
</div>
<?php include("jslink.php"); ?>
</form>
</body>
</html>
