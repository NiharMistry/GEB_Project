<html>
<head>

<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php

  $compid="";
  $compdate="";
  $consumerid="";
  $complain="";
  $solution="";
  $status="";
  $deptid="";
  $dc=new dataclass();
  $query="";
  $msg="";

?>

<?php
  if(isset($_POST['btnsubmit']))
  {
    $compid=$dc->primarykey("select max(compid) from complain");
    $compdate=date('y-m-d');
    $consumerid=$_SESSION['regid'];
    $complain=$_POST['txtcomplain'];
    $solution="none";
    $status="process";
    $deptid=$_POST['lstdept'];
    
    $query="insert into complain values('$compid','$compdate','$consumerid','$complain','$solution','$status','$deptid')";
    $result=$dc->saverecord($query);
    if($result)
    {
      $msg="complain Submit successfully..";
    }
    else
    {
        $msg="complain not Submited..";
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
        <h3>complain</h3> 
      </div>
        
        <div class="form-group">
            <label>Complain</label>
            <textarea class="form-control" name="txtcomplain" rows="5px" > </textarea>
        </div>

        <div class="form-group">
           <label>Department</label><span style="color:red;font-size:25px">*</span>
            <select name="lstdept" class="form-control">
                <?php 
                $tb=$dc->getTable("select deptid,deptname from department"); 
                while($rw=mysqli_fetch_array($tb))
                {
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
