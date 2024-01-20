<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color:#90d0f5;">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo1.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">

           <li class="nav-item nav-profile">
              <a class="nav-link" style="color:navy" href="adminhome.php">HOME</a>
           </li>

           <li class="nav-item nav-profile">
              <a class="nav-link" style="color:navy" href="consumerbill.php">BILL</a>
           </li>

           <li class="nav-item nav-profile">
              <a class="nav-link" style="color:navy" href="connectionrequestshow.php">REQUEST</a>
           </li>

           <li class="nav-item nav-profile">
              <a class="nav-link" style="color:navy" href="consumerconnection.php">CONNECTION</a>
           </li>

           <li class="nav-item nav-profile">
              <a class="nav-link" style="color:navy" href="connectionmeter.php">METER</a>
           </li>

           <li class="nav-item nav-profile">
              <a class="nav-link" style="color:navy" href="applicationshow.php">APPLICATION</a>
           </li>

           <li class="nav-item nav-profile">
              <a class="nav-link" style="color:navy" href="consumerlist.php">CONSUMER</a>
           </li>

            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Adminitrator</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../main/mainhome.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
         
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>