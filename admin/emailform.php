<html>

<head>
<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>

<?php
  $emailid="";
  $emaildate="";
  $emailto="";
  $subject="";
  $description="";
  $dc=new dataclass();
  $query="";
  $msg="";
?>

<?php

 if(isset($_POST['btnsave']))
 {
    $emaildate=date('y-m-d');
    $emailto=$_POST['txtemailto'];
    $subject=$_POST['txtsubject'];
    $description=$_POST['txtdescription'];
  
    $query="insert into email(emaildate,emailto,subject,description) values('$emaildate','$emailto','$subject','$description')";
    $result=$dc->saverecord($query);
    if($result)
      {
        $msg="Email send successfully...";
      }
      else
      {
        $msg="Email not send..";
      }
  }
     
 
  if(isset($_POST['btncancel']))
  {
      header('location:adminhome.php');
  } 
  
?>
</head>
<body>
 <form name="frmdiv" action="#" method="post">   
<div class="container-scroller">
    <?php include("nav.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper" style="background-color:white">

          <div class="row" style="margin-bottom:15px">
              <div class="col-md-12">  <h3>EMAIL FORM</h3> </div>
            </div> 
            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label>Email Address :</label>
                  <input class="form-control" type="text" name="txtemailto" value="" >
                </div>

                <div class="form-group">
                  <label>Subject : </label>
                  <input class="form-control" type="text" name="txtsubject" value="" >
                </div>

                <div class="form-group">
                  <label>Description : </label>
                  <textarea class="form-control" name="txtdescription" rows="5"> </textarea> 
                </div>

                <div class="form-group">     
                  <input class='btn btn-success' type="submit" name="btnsave" value="SAVE">
                  <input class='btn btn-danger' type="submit" name="btncancel" value="CANCEL">
                </div>   
                <div class="form-group">     
                <label><?php echo($msg); ?></label>
                </div>

              </div>  
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>   
  </div>
</div>
</form>
<?php include("jslink.php"); ?>
</body>
</html>
