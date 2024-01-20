<html>
<head>
<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
  $cityid="";
  $cityname="";
  $shortname="";
  $pincode="";
  $state="";
  $dc=new dataclass();
  $query="";
  $msg="";
?>

<?php

if($_SESSION['trans']=='update')
  {
    $cityid=$_SESSION['cityid'];
     $query="select * from city where cityid='$cityid'";
     $rw=$dc->getrecord($query);
     $cityname=$rw['cityname'];
     $shortname=$rw['shortname'];
     $pincode=$rw['pincode'];
     $state=$rw['state'];
  }

  if(isset($_POST['btnsave']))
 {
    $cityname=$_POST['txtcityname'];
    $shortname=$_POST['txtshortname'];
    $pincode=$_POST['txtpincode'];
    $state=$_POST['txtstate'];

    if($_SESSION['trans']=="new")
    {
      $query="insert into city(cityname,shortname,pincode,state) values('$cityname','$shortname','$pincode','$state')";
    } 

    if($_SESSION['trans']=="update")
    {
      $divid=$_SESSION['divid'];
      $query="update city set cityname='$cityname',shortname='$shortname',pincode='$pincode',state='$state' where cityid='$cityid'";
    } 
    
      $result=$dc->saverecord($query);
      if($result)
      {
        $_SESSION["trans"]=""; 
        header('location:cityshow.php');
      }
      else
      {
        $msg="Record not saved..";
      }
  }
     
 
  if(isset($_POST['btncancel']))
  {
    $_SESSION["divid"]="";
    $_SESSION['trans']="";
    header('location:cityshow.php');
  } 
  
    

?>

<?php
  if(isset($_POST['btnsave']))
  {
     header('location:cityshow.php');
  }
    
?>

</head>
<body>
 <form name="frmcity" action="#" method="post">   
<div class="container-scroller">
    <?php include("nav.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper" style="background-color:white">

          <div class="row" style="margin-bottom:15px">
              <div class="col-md-12">  <h3>CITY FORM</h3> </div>
            </div> 
            <div class="row">
              <div class="col-md-12">

                 <div class="form-group">
                 <label >Name : </label>
                <input class="form-control" type="text" name="txtcityname" value="<?php echo($cityname) ?>" ><br>
                </div>

                <div class="form-group">
                <label>Short Name : </label>
                <input class="form-control" type="text" name="txtshortname" value="<?php echo($shortname) ?>" ><br>
                </div>

                <div class="form-group">
                <label>Pincode : </label>
                <input class="form-control" type="text" name="txtpincode" value="<?php echo($pincode) ?>" ><br>
                </div>

                <div class="form-group">
                <label>State : </label>
                <input class="form-control" type="text" name="txtstate" value="<?php echo($state) ?>" ><br>
                </div>    

                <div class="form-group">
                <input class='btn btn-success' type="submit" name="btnsave" value="SAVE">
                <input class='btn btn-danger' type="submit" name="btncancel" value="CANCEL">
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
