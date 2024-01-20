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
    header('location:divisionform.php');
  }
  
  if(isset($_POST['btnupdate']))
  {
    $divid=$_POST['btnupdate'];
    $_SESSION['divid']=$divid;
    $_SESSION['trans']="update";
    header('location:divisionform.php');
  }

  if(isset($_POST['btndelete']))
  {
    $divid=$_POST['btndelete'];
    $query="delete from division where divid='$divid'";
    $result=$dc->saverecord($query);
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
              <div class="col-md-10">  <h3>DIVISION DETAILS</h3> </div>
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
                   <th>HEAD</th>
                   <th>CONTACT NO</th>
                   <th>UPDATE</th>
                   <th>DELETE</th>
                  </tr> 

               <?php 
                  $query="select * from division";
                  $tb=$dc->gettable($query);
                  while($rw=mysqli_fetch_array($tb))
                  {
                    echo("<tr>");
                      echo("<td>".$rw['divid']."</td>");
                      echo("<td>".$rw['divname']."</td>");
                      echo("<td>".$rw['shortname']."</td>");
                      echo("<td>".$rw['head']."</td>");
                      echo("<td>".$rw['contactno']."</td>");
                      echo("<td><button class='btn btn-primary' type='submit' name='btnupdate' value='".$rw['divid']."'>Update</button>  </td>");
                      echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value='".$rw['divid']."'>Delete</button>  </td>");
            
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
