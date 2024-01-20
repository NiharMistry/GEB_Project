<html>

<head>
<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>

<?php
  $connid="";
  $conndate="";
  $consumerid="";
  $propertytype="";
  $address="";
  $cityid="";
  $pincode="";
  $landmark="";
  $connload="";
  $conntype="";
  $charge="";
  $dc=new dataclass();
  $query="";
  $msg="";
?>

<?php

 if(isset($_POST['btnsave']))
 {
    $conndate=$_POST['txtconndate'];
    $consumerid=$_POST['txtconsumerid'];
    $propertytype=$_POST['txtpropertytype'];
    $address=$_POST['txtaddress'];
    $cityid=$_POST['lstcity'];
    $pincode=$_POST['txtpincode'];
    $landmark=$_POST['txtlandmark'];
    $connload=$_POST['txtconnload'];
    $conntype=$_POST['lstconntype'];
    $charge=$_POST['txtcharge'];
  
    $query="insert into connection(conndate,consumerid,propertytype,address,city,pincode,landmark,connload,conntype,charge) values('$conndate','$consumerid','$propertytype','$address','$cityid','$pincode','$landmark','$connload','$conntype','$charge')";
    $result=$dc->saverecord($query);
    if($result)
      {
        $msg="connection send successfully...";
      }
      else
      {
        $msg="connection not send..";
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
              <div class="col-md-12">  <h3>connection FORM</h3> </div>
            </div> 
            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label>Connection Date :</label>
                  <input class="form-control" type="date" name="txtconndate" value="" >
                </div>

                <?php
                  $consumerid=$_SESSION['consumerid'];
                  $query="select consumerid,consumername,address from consumer where consumerid='$consumerid'";
                  $rw=$dc->getrecord($query);
                  $consumerdi=$rw['consumerid'];
                  $consumername=$rw['consumername'];
                  $address=$rw['address'];
                 ?>

                <div class="form-group">
                <label>Consumer ID</label>
                 <input class="form-control" type="text" name="txtconsumerid" value='<?php echo($consumerid)  ?>' >
                </div>

                <div class="form-group">
                <label>Consumer Name</label>
                 <input class="form-control" type="text" name="txtconsumername" value='<?php echo($consumername)  ?>' >
                </div>

                <div class="form-group">
                  <label>Property Type : </label>
                  <input class="form-control" type="text" name="txtpropertytype" value="" >
                </div>

                <div class="form-group">
                  <label>Address : </label>
                  <textarea class="form-control" name="txtaddress" rows="5"> <?php echo($address) ?> </textarea> 
                </div>

                <div class="form-group">
                <label>City : </label>
                <select class="form-control" name="lstcity">
                  <?php
                  $query="select cityid,cityname from city";
                  $tb=$dc->gettable($query);
                  while($rw=mysqli_fetch_array($tb))
                  {
                    echo("<option value=".$rw['cityid'].">".$rw['cityname']."</option>");
                  }
                ?>
                </select>  
                </div>

                <div class="form-group">
                  <label>Pincode : </label>
                  <input class="form-control" type="text" name="txtpincode" value="" >
                </div>

                <div class="form-group">
                  <label>Landmark : </label>
                  <input class="form-control" type="text" name="txtlandmark" value="" >
                </div>

                <div class="form-group">
                  <label>Connection Load : </label>
                  <input class="form-control" type="text" name="txtconnload" value="" >
                </div>

                <div class="form-group">
                  <label>Connection Type : </label>
                  <select class="form-control" name="lstconntype">
                     <option>Commercial</option>
                     <option>Domestic</option>
                </select>

                </div>

                <div class="form-group">
                  <label>Charge : </label>
                  <input class="form-control" type="text" name="
                  " value="" >
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