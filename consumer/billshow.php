<html>
<head>
      <?php session_start() ?> 
       <?php include("csslink.php") ?>
       <?php include("../class/dataclass.php") ?>

       <?php
        $billid="";
        $billdate="";
        $consumerid="";
        $consumername="";
        $meterid="";
        $connectionid="";
        $consuunit="";
        $lastunit="";
        $meterrent="";
        $tax="";
        $addamt="";
        $lessamt="";
        $msg="";
        $query="";
        $dc=new dataclass();
      ?>


</head>
<body>
<form name="frmhome" action="#" method="post">
<?php include("header.php") ?>
  <main id="main">
     <div class="container" style="margin-top:100px">
     <div class="row">
        <div class='col-md-12'><h3>Consumer Bill Details</h3></div>
     </div>
     <div class="row text-center">
        <?php
            $consumerid=$_SESSION['regid'];
            $query="select billid,billdate,c.consumerid,consumername,meterid,connectionid,consuunit,lastunit,meterrent,tax,addamt,lessamt from bill b,consumer c where b.consumerid=c.consumerid and c.consumerid='$consumerid'";
            //echo($query);
            $tb=$dc->gettable($query);
          
            while($rw=mysqli_fetch_array($tb))
            {
            $billid=$rw["billid"];;
            $billdate=$rw["billdate"];
            $consumerid=$rw["consumerid"];
            $consumername=$rw["consumername"];
            $connectionid=$rw["connectionid"];
            $meterid=$rw["meterid"];
            $consuunit=$rw["consuunit"];
            $lastunit=$rw["lastunit"];
            $meterrent=$rw["meterrent"];
            $tax=$rw["tax"];
            $addamt=$rw["addamt"];
            $lessamt=$rw["lessamt"];
            $totalunit=$consuunit-$lastunit;
            $billamt=$totalunit*5;
            $totalamt=($billamt+$addamt+$tax+$meterrent)-$lessamt;

            echo("<div class='col-md-6'>"); 
            echo("<table class='table table-bordered' style='height:200px!important'>");			  
            echo("<tr><td>Bill ID</td> <td>".$billid."</td></tr>");	   
            echo("<tr><td>Bill Date</td> <td>".$billdate."</td></tr>");	   
            echo("<tr><td>Consumer ID</td> <td>".$consumerid."</td></tr>");	   
            echo("<tr><td>Consumer Name</td> <td>".$consumername."</td></tr>");	   
            echo("<tr><td>Connection ID</td> <td>".$connectionid."</td></tr>");	   
            echo("<tr><td>Meter Number</td> <td>".$meterid."</td></tr>");	   
            echo("<tr><td>Current Unit</td> <td>".$consuunit."</td></tr>");	   
            echo("<tr><td>Last Unit</td> <td>".$lastunit."</td></tr>");	   
            echo("<tr><td>Total Unit</td> <td>".$totalunit."</td></tr>");	   
            echo("<tr><td>Meter Rent</td> <td>".$meterrent."</td></tr>");	   
            echo("<tr><td>Add Amount</td> <td>".$addamt."</td></tr>");	   
            echo("<tr><td>Less Amount</td> <td>".$lessamt."</td></tr>");	   
            echo("<tr><td>Bill Amount</td> <td>".$billamt."</td></tr>");	   
            echo("<tr><td>Total Amount</td> <td>".$totalamt."</td></tr>");	   
            echo("</table>");	   
           echo("</div>");
        }
        ?>
    </div>  
</div>
    <?php include("footer.php") ?>
 </main>
</form>

<?php include("jslink.php"); ?>
</body>
</html>
