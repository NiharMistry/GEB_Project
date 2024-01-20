<html>
<head>

<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>

<?php
  $meterid="";
  $installdate="";
  $connid="";
  $metertype="";
  $consumerid="";
  $unit="";
  $dc=new dataclass();
  $query="";
  $msg="";

?>

<?php

if(isset($_POST['btnsubmit']))
{
   $meterid=$dc->primarykey("select max(meterid) from meter");
   $installdate=$_POST['installdate'];
   $connid=$_POST['connid'];
   $metertype=$_POST['metertype'];
   $consumerid=$_POST['consumerid'];
   $unit=$_POST['unit'];
   $query="insert into meter(meterid,installdate,consumerid,connid,metertype,unit) values('$meterid','$installdate','$consumerid','$connid','$metertype','$unit')";
   echo($query);
   $result=$dc->saverecord($query);
   if($result)
     {
       $msg="Record saved..";
     }
 }
    
 if(isset($_POST['btncancel']))
 {
   header('location:connectionmeter.php');
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
              <div class="col-md-12">  <h3>METER FORM</h3> </div>
            </div> 
            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label>Connection ID : </label>
                  <?php $connid=$_SESSION["connid"] ?>
                  <input class="form-control" type="text" name="connid" value="<?php echo($connid) ?>" ><br>
                </div>

                <div class="form-group">
                  <label>consumerid ID : </label>
                  <?php $consumerid=$_SESSION['consumerid'] ?>
                  <input class="form-control" type="text" name="consumerid" value="<?php echo($consumerid) ?>" ><br>
                </div>
                

                 <div class="form-group">
                 <label > Installatoin Date : </label>
                <input class="form-control" type="date" name="installdate"><br>
                </div>

                <div class="form-group">
                  <label>Meter Type </label>
                  <select class="form-control" name="metertype">
                    <option>Digital</option>
                    <option>Anolog</option>
                   </select>
                </div>

                <div class="form-group">
                 <label >Current Unit : </label>
                <input class="form-control" type="text" name="unit" value="" ><br>
                </div>

                               
                <div class="form-group">
                <input class='btn btn-success' type="submit" name="btnsubmit" value="SUBMIT">
                <input class='btn btn-danger' type="submit" name="btncancel" value="CANCEL">
                </div>   

                <div class="form-group">
                  <label><?php echo($msg) ?></label>
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
