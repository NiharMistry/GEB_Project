<html>
<head>
<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>
<?php
  $connid="";
  $consumername="";
  $address="";
  $propertytype="";
  $conntype="";
  $dc=new dataclass();
  $query="";
  $msg="";
?>

<?php
  if(isset($_POST['btnmeter']))
  {
    $_SESSION['connid']=$_POST['btnmeter'];
    header('location:meterform.php');
  }
    
?>

</head>
<body>
<form name="frmconn" action="#" method="post">   
<div class="container-scroller">
    <?php include("nav.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper" style="background-color:white">

          <div class="row" style="margin-bottom:15px">
              <div class="col-md-12 offset-2">  <h3>CONNECTION DETAILS</h3> </div>
          </div>    
          <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <table class="table table-bordered">
                  <tr>
                   <th>CONN ID</th>
                   <th>CONSUMER NAME</th>
                   <th>ADDRESS</th>
                   <th>PROPERTY TYPE</th>
                   <th>CONN TYPE</th>
                   <th>METER</th>
                  </tr> 

               <?php 
                  $query="select connid,c2.consumerid,consumername,c1.address,propertytype,conntype from connection c1,consumer c2 where c1.consumerid=c2.consumerid";
                  //echo($query);
                  $tb=$dc->gettable($query);
                  while($rw=mysqli_fetch_array($tb))
                  {
                    echo("<tr>");
                      echo("<td>".$rw['connid']."</td>");
                      echo("<td>".$rw['consumername']."</td>");
                      $_SESSION['consumerid']=$rw['consumerid'];
                      echo("<td>".$rw['address']."</td>");
                      echo("<td>".$rw['propertytype']."</td>");
                      echo("<td>".$rw['conntype']."</td>");
                      echo("<td><button class='btn btn-primary' type='submit' name='btnmeter' value='".$rw['connid']."'>Meter</button> </td>");
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
