<html>
<head>

<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
  $appid="";
  $appdate="";
  $apphead="";
  $details="";
  $consumerid="";
  $status="";
  $deptid="";
  $dc=new dataclass();
  $query="";
  $msg="";

?>

<?php
  if(isset($_POST['btnsubmit']))
  {
    $appid=$dc->primarykey("select max(appid) from application");
    $appdate=date('y-m-d');
    $consumerid=$_SESSION['regid'];
    $appheading=$_POST['lstappheading'];
    $details=$_POST['txtappdetails'];
    $deptid=$_POST['lstdept'];
    $status="pandding";
    $query="insert into application values('$appid','$appdate','$consumerid','$appheading','$details','$deptid','$status')";
    $result=$dc->saverecord($query);
    if($result)
    {
      $msg="Application Submit successfully..";
    }
    else
    {
        $msg="Application not Submited..";
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
        <h3>APPLICATION</h3> 
      </div>

        <div class="form-group">
            <label>Application Heading</label>
            <select name="lstappheading" class="form-control">
               <option>New Connection</option> 
               <option>Increse Load</option> 
               <option>Meter Change</option> 
               <option>Location Change</option> 
            </select>
        </div>
        <div class="form-group">
            <label>Application Details</label>
            <textarea class="form-control" name="txtappdetails" rows="5px" > </textarea>
            <label class='errmsg' id="lblname"></label>
        </div>

        <div class="form-group">
           <label>Department</label><span style="color:red;font-size:25px">*</span>
            <select name="lstdept" class="form-control">
                <?php 
                $tb=$dc->getTable("select deptid,deptname from department"); 
                while($rw=mysqli_fetch_array($tb))
                {
                if($cityid==$rw['deptid']) 
                echo("<option selected value=".$rw['deptid'].">".$rw['deptname']."</option>");
                else
                    echo("<option value=".$rw['deptid'].">".$rw['deptname']."</option>");
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
<?php include("footer.php") ?>
</form>

<?php include("jslink.php"); ?>
</body>
</html>
