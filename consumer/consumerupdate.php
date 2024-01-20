<html>
<head>

    <?php session_start(); ?>
    <?php include("csslink.php"); ?>
    <?php include("../class/dataclass.php"); ?>
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

    <?php
    if(isset($_POST['btnupdate']))
        {
            $consumerid=$_SESSION['regid'];
            $consumername=$_POST['txtconsumername'];
            $address=$_POST['txtaddress'];
            $cityname=$_POST['lstcity'];
            $pincode=$_POST['txtpincode'];	
            $filename=$_FILES['fupload']['name'];
            $tmpname=$_FILES['fupload']['tmp_name'];
            $ext=pathinfo($filename,PATHINFO_EXTENSION);
            $imagename="consumer".$consumerid.".".$ext;	
            
            if(isset($_FILES['fupload']))
            { 		  
            $query="update consumer set consumername='$consumername',address='$address',cityname='$cityname',pincode='$pincode',image='$imagename' where consumerid='$consumerid'";
            }
            else
            {
                $query="update consumer set consumername='$consumername',address='$address',cityname='$cityname',pincode='$pincode' where consumerid='$consumerid'";
            }
                    
            $result=$dc->saveRecord($query);
            if($result)
            {
            if(isset($_FILES['fupload']))
                {
                move_uploaded_file($tmpname,"consumerimages/".$imagename);
                }
            $msg="Profile update successfully";
            }
        }	 
	 
	if(isset($_POST['btncancel']))
	{
	   header('location:ownerhome.php');
	}	

?>
</head>
<body>
<form name="frmhome" action="#" method="post" enctype="multipart/form-data">
   <?php include("header.php") ?>
   <main id="main">
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
    <div class="container">
    <div class="row" style="margin-top:100px;padding-bottom:20px;">
      <div class="col-md-4"> 			   
        <img src='<?php echo("consumerimages/".$filename) ?>' style="width:100%;height:390px;padding:15px;border:2px solid navy"> 
      </div>

      <div class="col-md-8"> 			   
      <div class="form-group">
                      <label>Customer Name</label><span style="color:red;font-size:25px">*</span>
                        <input type="text" class="form-control" name="txtconsumername" value='<?php echo($consumername) ?>' placeholder="Enter customer" onchange='onlyalpha(this,lblname)'/>
                <label class='errmsg' id="lblname"></label>
                    </div>
            
            <div class="form-group">
                      <label>address</label><span style="color:red;font-size:25px">*</span>
                        <input type="text" class="form-control" name="txtaddress" value='<?php echo($address) ?>' placeholder="Enter address" onchange='checkblank(this,lbladd)' />
              <label class='errmsg' id="lbladd"></label>
                    </div>
            
            <div class="form-group">
                      <label>city Name</label><span style="color:red;font-size:25px">*</span>
                        <select name="lstcity" class="form-control">
                <?php 
                $tb=$dc->getTable("select cityid,cityname from city"); 
                while($rw=mysqli_fetch_array($tb))
                {
                if($cityid==$rw['cityid']) 
                echo("<option selected value=".$rw['cityname'].">".$rw['cityname']."</option>");
                else
                  echo("<option value=".$rw['cityname'].">".$rw['cityname']."</option>");
                }
                ?>
              </select>
              
                    </div>
            
            <div class="form-group">
                      <label>Pincode</label><span style="color:red;font-size:25px">*</span>
                        <input type="text" class="form-control" name="txtpincode" value='<?php echo($pincode) ?>' placeholder="Enter Pincode" onchange='checklength(this,lblno,1,10)' />
              <label class='errmsg' id="lblno"></label>
                    </div>
            
                      
          <div class="form-group">
                      <label>photo</label>
                        <input type="file" class="form-control" name="fupload">
                  </div>
                      
            
            <div class="form-group">
                        <input type="submit" class="btn btn-success" name="btnupdate" value="Update">
              <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
                    </div>
            
              <div class="form-group">
                        <label name="lblmsg"> <?php echo($msg) ?></label>
                    </div>
          </div>
      </div> 
    </div>  
</div>
 </main>
 <?php include("footer.php") ?>
</form>

<?php include("jslink.php"); ?>
</body>
</html>
