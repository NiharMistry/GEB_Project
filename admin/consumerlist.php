<html>
<head>
<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
  $consumerid="";
  $consumername="";
  $dc=new dataclass();
  $query="";
  $msg="";
?>

<?php
  if(isset($_POST['btnconnection']))
  {
    $_SESSION['consumerid']=$_POST['btnconnection'];
    //header('location:consumerform.php');
  }
    
?>

</head>
<body>
<form name="frmconsumer" action="#" method="post">   
<div class="container-scroller">
    <?php include("nav.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper" style="background-color:white">

          <div class="row" style="margin-bottom:15px">
              <div class="col-md-10">  <h3>CONSUMER DETAILS</h3> </div>
          </div>    
          <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                   <th>ID</th>
                   <th>NAME</th>
                   <th>ADDRESS</th>
                   <th>CITY</th>
                   <th>PINCODE</th>
                  </tr> 

               <?php 
                  $query="select * from consumer";
                  $tb=$dc->gettable($query);
                  while($rw=mysqli_fetch_array($tb))
                  {
                    echo("<tr>");
                      echo("<td>".$rw['consumerid']."</td>");
                      echo("<td>".$rw['consumername']."</td>");
                      echo("<td>".$rw['address']."</td>");
                      echo("<td>".$rw['cityname']."</td>");
                      echo("<td>".$rw['pincode']."</td>");
                      
                      echo("</tr>");
                  }
                ?>
               </table>
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
