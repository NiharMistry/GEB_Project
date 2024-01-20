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
  
  $reqid="";
  $reqdate="";
  $consumerid="";
  $reply="";
  $status="";
  $msg="";
  $dc=new dataclass();
?>


<?php


 if(isset($_POST['btnconnection']))
 {
   $reqid=$_POST['btnconnection'];
  
 }

?>

</head>
<body>
<form name="frmreq" action="#" method="post">   
<div class="container-scroller">
    <?php include("nav.php"); ?>
      <div class="container-fluid page-body-wrapper">
       <?php include("sidebar.php"); ?>
        <div class="main-panel" >
          <div class="content-wrapper" style="background-color:white">

          <div class="row">
              <div class="col-md-12">
                <h3>CONNECTION REQUEST</h3>
              </div>
            </div>    

            <div class="row">
              <div class="col-md-12">
           
              <?php
				  
				   echo("<table class='table table-bordered'>");
				   echo("<tr>");
				   echo("<th>Id</th><th>Date</th><th>Consumerid</th><th>Connctoin For</th><th>Phase</th><th>Address</th><th>City</th><th>Connection</th>");
				   $query="select reqid,reqdate,c.consumerid,consumername,connfor,phase,r.address,city from connrequest r,consumer c where r.consumerid=c.consumerid and status='padding'";
          // echo($query);
				   $tb=$dc->getTable($query);   				  
				   while($rw=mysqli_fetch_array($tb))
				   {
					  echo("<tr>");
                echo("<td>".$rw['reqid']."</td>");
                echo("<td>".$rw['reqdate']."</td>");
                echo("<td>".$rw['consumername']."</td>");
                echo("<td>".$rw['connfor']."</td>");
                echo("<td>".$rw['phase']."</td>");
                echo("<td>".$rw['address']."</td>");
                echo("<td>".$rw['city']."</td>");

					  echo("<td><button class='btn btn-primary' type='submit' name='btnconnection' value=".$rw['reqid'].">Connection</button></td>");
					  echo("</tr>");
				   }
				   echo("<tr>");
				   echo("<td colspan='6'>".$msg."</td>");
				   echo("</tr>");
				   echo("</table>");
				 ?>
              
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
