<html>
<head>
      <?php session_start() ?> 
       <?php include("csslink.php") ?>
       <?php include("../class/dataclass.php") ?>

       <?php
        $consumerid="";
        $consumername="";
        $address="";
        $cityname="";
        $pincode="";
        $filename="";
        $tmpname="";
        $msg="";
        $query="";
        $dc=new dataclass();
      ?>


</head>
<body>
<form name="frmhome" action="#" method="post">
    <?php
            $consumerid=$_SESSION['regid'];
            $query="select consumerid,consumername,address,cityname,pincode,image from consumer where consumerid='$consumerid'";
            $rw=$dc->getRecord($query);
            if($rw)
            {
            $consumername=$rw["consumername"];
            $address=$rw["address"];
            $cityname=$rw["cityname"];
            $pincode=$rw["pincode"];
            $filename=$rw["image"];
            }
        ?>

  <?php include("header.php") ?>
  <main id="main">

 <div class="container" style="margin-top:100px">
     <div class="row text-center">
         <div class="col-md-5"> 			   
          <img src='<?php echo("consumerimages/".$filename) ?>' style="width:80%;height:200px;padding:15px;border:2px solid navy"> 
        </div>
         <div class="col-md-5"> 
            <table class="table table-bordered" style="height:200px!important">			  
              <tr>
                <td>User Name</td>
              <td><?php echo($consumername) ?></td> 
              </tr>	   
              <tr>
                <td>Address</td>
              <td><?php echo($address) ?></td> 
              </tr>	   
              <tr>
                <td>City Name</td>
              <td><?php echo($cityname) ?></td> 
              </tr>	   
              <tr>
              <td>Pincode</td>
              <td><?php echo($pincode) ?></td> 
              </tr>	   
             </table>	   
    
    </div> 
    </div>  
</div>
    <?php include("footer.php") ?>
 </main>
</form>

<?php include("jslink.php"); ?>
</body>
</html>
