<html>
<head>

<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
  $dc=new dataclass();
  $query="";
  $msg="";

?>

<?php
  if(isset($_POST['btnsubmit']))
  {


  }
?>
</head>
<body>
<form name="frmhome" action="#" method="post">
    <?php include("header.php") ?>
    
    <main id="main">

 <div class="container">
    <div class="row">
      <div class="col-md-12">

    </div> 
    </div>  
</div>
  </main>
  <?php include("footer.php") ?>
</form>

<?php include("jslink.php"); ?>
</body>
</html>
