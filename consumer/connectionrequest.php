<html>
<head>

<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
  $reqid="";
  $reqdate="";
  $connfor="";
  $phase="";
  $consumerid="";
  $status="";
  $adddress="";
  $city="";

  $dc=new dataclass();
  $query="";
  $msg="";
  ?>

  <?php
  if(isset($_POST['btnsubmit']))
  {
    $reqid=$dc->primarykey("select max(reqid) from connrequest");
    $reqdate=date('y-m-d');
    $consumerid=$_SESSION['regid'];
    $connfor=$_POST['lstconnfor'];
    $phase=$_POST['lstphase'];
    $adddress=$_POST['txtaddress'];
    $city=$_POST['lstcity'];
    $status="padding";
    $query="insert into connrequest values('$reqid','$reqdate','$consumerid','$connfor','$phase','$adddress','$city','$status')";
    $result=$dc->saverecord($query);
    if($result)
    {
      $msg="connection request Submit successfully..";
    }
    else
    {
       $msg="connction request not Submited..";
    }
  }
?>


</head>
<body>
<form name="frmhome" action="#" method="post">
    <?php include("header.php") ?>
    
    <main id="main">

    <div class="container" style="margin-top:100px;margin-bottom:20px">
    <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">

      <div class="form-group">
        <h3>CONNECTION REQUEST</h3> 
      </div>
       <div class="form-group">
            <label>Connection For</label>
            <select name="lstconnfor" class="form-control">
               <option>Home</option> 
               <option>Shop</option> 
               <option>Factory</option> 
               <option>Other</option> 
            </select>
        </div>

        <div class="form-group">
            <label>Phase</label>
            <select name="lstphase" class="form-control">
               <option>One Phase</option> 
               <option>Three Phase</option> 
             </select>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="txtaddress" rows="4px" > </textarea>
        </div>

        <div class="form-group">
           <label>City</label>
            <select name="lstcity" class="form-control">
                <?php 
                $tb=$dc->getTable("select cityid,cityname from city"); 
                while($rw=mysqli_fetch_array($tb))
                {
                    echo("<option value=".$rw['cityname'].">".$rw['cityname']."</option>");
                }
                ?>
              </select>
          </div>
               
        <div class="form-group">
           <input type="submit" class="btn btn-success" name="btnsubmit" value="Submit">
           <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
        </div>
        
        <div class="form-group">
            <label name="lblmsg"> <?php echo($msg) ?></label>
            </div>
        </div>

      </div> 
    </div>  
</div>

 </main>
  </main>
  <?php include("footer.php") ?>
</form>

<?php include("jslink.php"); ?>
</body>
</html>
