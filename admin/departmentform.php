<html>
<head>

<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>

<?php
  $deptid="";
  $deptname="";
  $deptshortname="";
  $depthead="";
  $divid="";
  $dc=new dataclass();
  $query="";
  $msg="";

?>

<?php

if($_SESSION['trans']=='update')
{
  $deptid=$_SESSION['deptid'];
   $query="select * from department where deptid='$deptid'";
   $rw=$dc->getrecord($query);
   $deptname=$rw['deptname'];
   $deptshortname=$rw['shortname'];
   $depthead=$rw['head'];
   $divid=$rw['divid'];
}


if(isset($_POST['btnsave']))
{
   $deptname=$_POST['deptname'];
   $deptshortname=$_POST['deptshortname'];
   $depthead=$_POST['depthead'];
   $divid=$_POST['lstdiv'];

   if($_SESSION['trans']=="new")
   {
     $query="insert into department(deptname,shortname,head,divid) values('$deptname','$deptshortname','$depthead','$divid')";
   } 

   if($_SESSION['trans']=="update")
   {
     $deptid=$_SESSION['deptid'];
     $query="update department set deptname='$deptname',shortname='$deptshortname',head='$depthead',divid='$divid' where deptid='$deptid'";
   } 
   
     $result=$dc->saverecord($query);
     if($result)
     {
       $_SESSION["trans"]=""; 
       header('location:departmentshow.php');
     }
     else
     {
       $msg="Record not saved..";
     }
 }
    

 if(isset($_POST['btncancel']))
 {
   $_SESSION["deptid"]="";
   $_SESSION['trans']="";
   header('location:departmentshow.php');
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
              <div class="col-md-12">  <h3>DEPARTMENT FORM</h3> </div>
            </div> 
            <div class="row">
              <div class="col-md-12">

                 <div class="form-group">
                 <label >Name : </label>
                <input class="form-control" type="text" name="deptname" value="<?php echo($deptname) ?>" ><br>
                </div>

                <div class="form-group">
                <label>Short Name : </label>
                <input class="form-control" type="text" name="deptshortname" value="<?php echo($deptshortname) ?>" ><br>
                </div>

                <div class="form-group">
                <label>Head : </label>
                <input class="form-control" type="text" name="depthead" value="<?php echo($depthead) ?>" ><br>
                </div>

                <div class="form-group">
                <label>Division</label>
                <select class="form-control" name="lstdiv">
                  <?php
                  $query="select divid,divname from division";
                  $tb=$dc->gettable($query);
                  while($rw=mysqli_fetch_array($tb))
                  {
                    echo("<option value=".$rw['divid'].">".$rw['divname']."</option>");
                  }
                ?>
                </select>  
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
