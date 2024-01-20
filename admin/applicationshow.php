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
                <h3>APPLICATION FROM CONSUMER</h3>
              </div>
            </div>    

            <div class="row">
              <div class="col-md-12">
           
              <?php
				  
				   echo("<table class='table table-bordered'>");
				   echo("<tr>");
				   echo("<th>App ID</th><th>App Date</th><th>Consumer Name</th><th>Application Heading</th><th>Details</th><th>Department</th><th>Reply</th>");
				   $query="select appid,appdate,c.consumerid,consumername,appheading,details,deptname from application a,department d,consumer c where a.consumerid=c.consumerid and a.deptid=d.deptid and status='pandding'";
                  // echo($query);
				   $tb=$dc->getTable($query);   				  
				   while($rw=mysqli_fetch_array($tb))
				   {
					  echo("<tr>");
					  echo("<td>".$rw['appid']."</td>");
				      echo("<td>".$rw['appdate']."</td>");
					  echo("<td>".$rw['consumername']."</td>");
                      echo("<td>".$rw['appheading']."</td>");
                      echo("<td>".$rw['details']."</td>");
                      echo("<td>".$rw['deptname']."</td>");
                     

					  echo("<td><button class='btn btn-primary' type='submit' name='btnreply' value=".$rw['appid'].">Reply</button></td>");
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
