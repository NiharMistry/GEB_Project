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
  if(isset($_POST['btnsubmit']))
  {


  }

?>

</head>
<body>
<div class="container-scroller">
    <?php include("nav.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            
           <div class="row">
             <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                  <div class="card-body">
                    <h2 class="mb-5">CONSUMERS</h2>
                    <h3 class="mb-5">
                     <?php 
                          $query="select count(*) from register where usertype='Consumer'";
                          $count=$dc->counter($query);
                          echo("TOTAL $count");
                         ?>
                    </h3>
                    </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <h2 class="mb-5">CONNECTION</h2>
                    <h3 class="mb-5">
                     <?php 
                          $query="select count(*) from connection";
                          $count=$dc->counter($query);
                          echo("TOTAL $count");
                         ?>
                    </h3>
                    </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <h2 class="mb-5">METERS</h2>
                    <h3 class="mb-5">
                     <?php 
                          $query="select count(*) from meter";
                          $count=$dc->counter($query);
                          echo("TOTAL $count");
                         ?>
                    </h3>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <h3> Gujarat State Electricity About Us </H3>
                  <p style="text-align:justify;font-size:20px">
                  Gujarat State Electricity Corporation Limited (GSECL) was incorporated in August 1993 and is registered under the Companies Act, 1956 with the objectives to initiate a process of restructuring of Power Sector and to mobilize resources from the market for adding to the generating capacity of the State and improving the quality and cost of existing generation. The Company was promoted by erstwhile Gujarat Electricity Board (GEB) as it's wholly owned subsidiary in the context of liberalization and as a part of efforts towards restructuring of the Power Sector. The Memorandum and Articles of Association of GSECL envisage a wide spectrum of activities to improve the electricity infrastructure of Gujarat. GSECL has initiated its activities in the field of Generation of Power.
                  </p>
               </div>
              </div>
           
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>   
  </div>
</div>
<?php include("jslink.php"); ?>
</body>
</html>
