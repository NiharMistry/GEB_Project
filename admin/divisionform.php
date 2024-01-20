<html>
<head>
<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>

<?php
  $divid="";
  $divname="";
  $shortname="";
  $head="";
  $contactno="";
  $dc=new dataclass();
  $query="";
  $msg="";

?>

<?php

  if($_SESSION['trans']=='update')
  {
    $divid=$_SESSION['divid'];
     $query="select * from division where divid='$divid'";
     $rw=$dc->getrecord($query);
     $divname=$rw['divname'];
     $shortname=$rw['shortname'];
     $head=$rw['head'];
     $contactno=$rw['contactno'];
  }

 if(isset($_POST['btnsave']))
 {
    $divname=$_POST['txtdivname'];
    $shortname=$_POST['txtshortname'];
    $head=$_POST['txthead'];
    $contactno=$_POST['txtcontactno'];

    if($_SESSION['trans']=="new")
    {
      $query="insert into division(divname,shortname,head,contactno) values('$divname','$shortname','$head','$contactno')";
    } 

    if($_SESSION['trans']=="update")
    {
      $divid=$_SESSION['divid'];
      $query="update division set divname='$divname',shortname='$shortname',head='$head',contactno='$contactno' where divid='$divid'";
    } 
    
      $result=$dc->saverecord($query);
      if($result)
      {
        $_SESSION["trans"]=""; 
        header('location:divisionshow.php');
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
    header('location:divisionshow.php');
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
              <div class="col-md-12">  <h3>DIVISION FORM</h3> </div>
            </div> 
            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label >Name : </label>
                  <input class="form-control" type="text" name="txtdivname" value="<?php echo($divname) ?>" >
                </div>

                <div class="form-group">
                  <label>Short Name : </label>
                  <input class="form-control" type="text" name="txtshortname" value="<?php echo($shortname) ?>" ><br>
                </div>

                <div class="form-group">
                  <label>Head : </label>
                  <input class="form-control" type="text" name="txthead" value="<?php echo($head) ?>" ><br>
                </div>

                <div class="form-group">
                  <label>Contact No. : </label>
                  <input class="form-control" type="text" name="txtcontactno" value="<?php echo($contactno) ?>" > <br>
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
