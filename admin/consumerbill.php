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
  if(isset($_POST['btnbill']))
  {
    $_SESSION['consumerid']=$_POST['btnbill'];
    header('location:billform.php');
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
              <div class="col-md-12 offset-3">  <h3>CONSUMER DETAILS</h3> </div>
          </div>    
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <table class="table table-bordered">
                  <tr>
                   <th>ID</th>
                   <th>NAME</th>
                   <th>CONNECTION</th>
                  </tr> 

               <?php 
                  $query="select * from consumer";
                  $tb=$dc->gettable($query);
                  while($rw=mysqli_fetch_array($tb))
                  {
                    echo("<tr>");
                      echo("<td>".$rw['consumerid']."</td>");
                      echo("<td>".$rw['consumername']."</td>");
                      echo("<td><button class='btn btn-primary' type='submit' name='btnbill' value='".$rw['consumerid']."'>Bill</button>  </td>");
                      
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
