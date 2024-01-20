<html>
<head>
<?php session_start(); ?>
<?php include("csslink.php"); ?>
<?php include("../class/dataclass.php"); ?>

<?php
  $billid="";
  $billdate="";
  $consumerid="";
  $connectionid="";
  $meterid="";
  $consunit="";
  $lastunit="";
  $meterrent="";
  $tax="";
  $addamt="";
  $lessamt="";
  $dc=new dataclass();
  $query="";
  $msg="";
?>

<?php
 if(isset($_POST['btnsubmit']))
 {
   $billid=$dc->primarykey("select max(billid) from bill");
   $billdate=date('y-m-d');
   $consumerid=$_POST['txtconsumerid'];
   $connid=$_POST['lstconnid'];
   $meterid=$_POST['lstmeterid'];
   $consunit=$_POST['txtconsunit'];
   $lastunit=$_POST['txtlastunit'];
   $meterrent=$_POST['txtmeterrent'];
   $tax=$_POST['txttax'];
   $addamt=$_POST['txtaddamt'];
   $lessamt=$_POST['txtlessamt'];
   
   $query="insert into bill values('$billid','$billdate','$consumerid','$connid','$meterid','$consunit','$lastunit','$meterrent','$tax','$addamt','$lessamt')";
   echo($query);
   $result=$dc->saverecord($query);
   if($result)
   {
     $msg="bill Submit successfully..";
   }
   else
   {
       $msg="bill not Submited..";
   }
 }
?>

</head>
<body>
<form name="frmdiv" action="#" method="post">   
<?php $consumerid=$_SESSION['consumerid']; ?>
<div class="container-scroller">
    <?php include("nav.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper" style="background-color:white">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
        <div class="form-group">
        <h3>CONSUMER BILL DETAILS FORM</h3> 
      </div>

         <div class="form-group">
            <label>Consumer ID</label>
             <input type="text" class="form-control" name="txtconsumerid" value='<?php echo($consumerid) ?>' >
         </div>
        
        <div class="form-group">
           <div class="col-md-6" style="float:left">
           <label>Connection ID</label>
           <select name="lstconnid" class="form-control">
               <?php 
                 $tb=$dc->getTable("select connid from connection where consumerid='$consumerid'"); 
                while($rw=mysqli_fetch_array($tb))
                {
                   echo("<option value=".$rw['connid'].">".$rw['connid']."</option>");
                }
                ?>
              </select>
            </div>
         <div class="col-md-6" style="float:left">
           <label>Meter ID</label>
               <select name="lstmeterid" class="form-control">
                  <?php 
                  $tb=$dc->getTable("select meterid from meter where consumerid='$consumerid'"); 
                  while($rw=mysqli_fetch_array($tb))
                  {
                     echo("<option value=".$rw['meterid'].">".$rw['meterid']."</option>");
                  }
                  ?>
               </select>   
            </div>
          </div>

          

         <div class="form-group">
           <div class="col-md-6" style="float:left">
            <label>Consum Unit</label>
            <input type="text" class="form-control" name="txtconsunit" value="">
            </div>
             <div class="col-md-6" style="float:left">
             <label>Last Unit</label>
            <input type="text" class="form-control" name="txtlastunit" value="">
              </div>
         </div>

         <div class="form-group">
            <label>Meter Rent</label>
            <input type="text" class="form-control" name="txtmeterrent" value="">
         </div>

         <div class="form-group">
            <label>Tax</label>
            <input type="text" class="form-control" name="txttax" value="">
         </div>

         <div class="form-group">
            <div class="col-md-6" style="float:left">
            <label>Add Amount</label>
             <input type="text" class="form-control" name="txtaddamt" value="">
            </div>
            <div class="col-md-6" style="float:left">
            <label>Less Amount</label>
             <input type="text" class="form-control" name="txtlessamt" value="">
            </div>
        </div>

       <div class="form-group" style="text-align:center;margin-top:15px">
           <input type="submit" class="btn btn-success" name="btnsubmit" value="Submit">
           <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
        </div>
        
        <div class="form-group">
            <label name="lblmsg"> <?php echo($msg) ?></label>
            </div>
        </div>

      </div> 
    </div>  
    </div>
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
