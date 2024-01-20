<html>
<head>

<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
    $emailid="";
    $emaildate="";
    $emailfrom="";
    $emailto="";
    $subject="";
    $description="";
    $msg="";
    $dc=new DataClass();
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

 <div class="container" style="margin-top:100px">
    <div class="row">
      <div class="col-md-12">

      <?php
				   $regid=$_SESSION['regid'];
				   $rw=$dc->getrecord("select emailid from register where regid='$regid'");
				   $emailid=$rw['emailid'];
				   $query="select emailid,emaildate,emailto,subject,description from email where emailto='$emailid'";
           //echo($query);
           $tb=$dc->getTable($query);
				  
				   echo("<table class='table table-bordered'>");
				   echo("<tr style='background-color:gray;color:white'><th>Email Date</th><th>Email Address</th><th>Subject</th><th>Description</th></tr>");		  
				   
				   while($rw=mysqli_fetch_array($tb))
				   {
					  echo("<tr>");
						  echo("<td>".$rw['emaildate']."</td>");
						  echo("<td>".$rw['emailto']."</td>");
						  echo("<td>".$rw['subject']."</td>");
						  echo("<td>".$rw['description']."</td>");
					  echo("</tr>");
				   }
				   echo("</table>");
				 ?>
			   

    </div> 
    </div>  
</div>
  </main>
  <?php include("footer.php") ?>
</form>

<?php include("jslink.php"); ?>
</body>
</html>
