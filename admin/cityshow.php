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
  if(isset($_POST['btnnew']))
  {
    $_SESSION['trans']="new";
    header('location:cityform.php');
  }
  
  if(isset($_POST['btnupdate']))
  {
    $cityid=$_POST['btnupdate'];
    $_SESSION['cityid']=$cityid;
    $_SESSION['trans']="update";
    header('location:cityform.php');
  }

  if(isset($_POST['btndelete']))
  {
    $cityid=$_POST['btndelete'];
    $query="delete from city where cityid='$cityid'";
    $result=$dc->saverecord($query);
  }

?>

</head>
<body>
<form name="frmcity" action="#" method="post">   
<div class="container-scroller">
    <?php include("nav.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper" style="background-color:white">

          <div class="row" style="margin-bottom:15px">
              <div class="col-md-10">  <h3>CITY DETAILS</h3> </div>
              <div class="col-md-2">
              <button class='btn btn-success' type='submit' name='btnnew' value="new">New</button>
              </div>
          </div> 
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                   <th>ID</th>
                   <th>NAME</th>
                   <th>SHORT NAME</th>
                   <th>PINCODE</th>
                   <th>STATE</th>
                   <th>UPDATE</th>
                   <th>DELETE</th>
                  </tr> 

               <?php 
                  $query="select * from city";
                  $tb=$dc->gettable($query);
                  while($rw=mysqli_fetch_array($tb))
                  {
                    echo("<tr>");
                      echo("<td>".$rw['cityid']."</td>");
                      echo("<td>".$rw['cityname']."</td>");
                      echo("<td>".$rw['shortname']."</td>");
                      echo("<td>".$rw['pincode']."</td>");
                      echo("<td>".$rw['state']."</td>");
                      echo("<td><button class='btn btn-primary' type='submit' name='btnupdate' value='".$rw['cityid']."'>Update</button>  </td>");
                      echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value='".$rw['cityid']."'>Delete</button>  </td>");
            
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
