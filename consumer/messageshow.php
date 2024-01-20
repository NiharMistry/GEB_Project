<html>
<head>

<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
    $msgid="";
    $msgdate="";
    $mobileno="";
    $message="";
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
				   $rw=$dc->getrecord("select contactno from register where regid='$regid'");
				   $mobileno=$rw['contactno'];
				 
				   $query="select msgid,msgdate,message,mobileno from message where mobileno='$mobileno'";
				   $tb=$dc->getTable($query);
				  
				   echo("<table class='table table-bordered'>");
				   echo("<tr style='background-color:gray;color:white'><th>Message Date</th><th>Mobile Number</th><th>Message</th></tr>");		  
				   
				   while($rw=mysqli_fetch_array($tb))
				   {
					  echo("<tr>");
						  echo("<td>".$rw['msgdate']."</td>");
						  echo("<td>".$rw['mobileno']."</td>");
						  echo("<td>".$rw['message']."</td>");
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
