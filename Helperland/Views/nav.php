<?php

$base_url = "http://localhost/Helperland/";

// Header Nav


 if (!isset($_SESSION['username'])) { ?>

<section class="header-nav">
 <nav class="navbar sticky-top navbar-expand-lg ">
   <div class="container">
     <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png" class="header-logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  w-100 justify-content-end">
     
        <li class="nav-item  book">
        <a class="nav-link book1" href="./book-service.php">Book Now</a>
        </li>
     
        <li class="nav-item price">
        <a class="nav-link pr" href="./Prices.php">Prices & services</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Warranty</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Blog</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="./Contact.php">Contact</a>
        </li>
     
        <li class="nav-item login">
        <a class="nav-link login1" href=".#myModal">Login</a>
        </li>
     
        <li class="nav-item become">
        <a class="nav-link helper" href="./Service.php">Become a Helper</a>
        </li>
       </ul>
      </div>
     </div>
    </nav>
   </section>


<!-- Mobile Nav -->

<section class="mobile-nav">

<nav class="navbar sticky-top navbar-expand-lg ">
   <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png" class="header-logo"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

 <div class="offcanvas offcanvas-end" id="demo" style="width:262px;">

   <div class="offcanvas-body">
   <div class="dash">
   
    <a href="./book-service.php">Book Now</a>
    <a href="./Prices.php">Prices & services</a>
    <a href="#">Warrant</a>
    <a href="#">Blog</a>
    <a href="./Contact.php">Contact</a>
    <a href=".#myModal">Login</a>
    <a href="./Service.php">Become a Helper</a>
    <div class="hrr"><hr></div>
    <div class="face">
    <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
    <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
   </div>
  </div>
 </div>
</div>
</nav>
</section>

<?php } ?>


<?php if((isset($_SESSION['username'])) && (isset($_SESSION['usertypeid'])) && ($_SESSION['usertypeid'] == 0)) { ?>

<!-- Header Navbar -->

<section class="header-nav">
 <nav class="navbar sticky-top navbar-expand-lg">
   <div class="container">
     <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png" class="header-logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  w-100 justify-content-end">
     
        <li class="nav-item  book">
        <a class="nav-link book1" href="./book-service.php">Book Now</a>
        </li>
     
        <li class="nav-item price">
        <a class="nav-link pr" href="./Prices.php">Prices & services</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Warranty</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Blog</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="./Contact.php">Contact</a>
        </li>

        <li class="nav-item dropdown notification-bttn" style="margin-top: -5px;">
         <div class="dropdown">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 25px; color: white;margin-top: 5px;"></i>
            <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu" id="menu1" style="margin-top: 15px;">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>
        </li>           

        <li class="nav-item dropdown user-logo">
         <div class="dropdown">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
           <img src="../assets/image/admin-user.png">
          </button>
        <div class="dropdown-menu" id="menu" style="margin-top: 15px;">
          <a class="dropdown-item" href="./customer-dashboard.php">My Dashboard</a>
          <a class="dropdown-item" href="./customer-setting.php">My Setting</a>
          <a class="dropdown-item logout" href="#">Logout</a>
        </div>
       </div>
       </li>
      
       </ul>
      </div>
     </div>
    </nav>
   </section>


<!-- Mobile Nav -->

<section class="mobile-nav">

<nav class="navbar sticky-top navbar-expand-lg ">
   <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png" class="header-logo"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

         <div class="dropdown notify">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 25px; color: white;margin-top: 5px;"></i>
           <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>

 <div class="offcanvas offcanvas-end" id="demo" style="width:270px;">

  <div class="offcanvas-header">
      <h1 class="offcanvas-title">Welcome,<br><b><?php echo $_SESSION['name']; ?></b></h1>
  </div>

 <div class="hrr"><hr></div>

   <div class="offcanvas-body" style="margin-top: -20px !important;">
   <div class="dash">
   
   <a href="./customer-dashboard.php">Dashboard</a>
    <a href="./service-history.php">Service History</a>
    <a href="#">Service Schedule</a>
    <a href="#">Favourite Pros</a>
    <a href="#">Invoices</a>
    <a href="./customer-setting.php">My Settings</a>
    <a href="#" class="logout">Logout</a>

    <div class="hrr"><hr></div>

    <a href="./book-service.php">Book Now</a>
    <a href="./Prices.php">Prices & services</a>
    <a href="#">Warrant</a>
    <a href="#">Blog</a>
    <a href="./Contact.php">Contact</a>
    <a href="./Service.php">Become a Helper</a>
    <div class="hrr"><hr></div>
    <div class="face">
    <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
    <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
   </div>
  </div>
 </div>
</div>
</nav>
</section>

<?php } ?>


<?php if((isset($_SESSION['username'])) && (isset($_SESSION['usertypeid'])) && ($_SESSION['usertypeid'] == 1)) { ?>

<!-- Header Navbar -->

<section class="header-nav">
 <nav class="navbar sticky-top navbar-expand-lg">
   <div class="container">
     <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png" class="header-logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  w-100 justify-content-end">
          
        <li class="nav-item price">
        <a class="nav-link pr" href="./Prices.php">Prices & services</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Warranty</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="#">Blog</a>
        </li>
     
        <li class="nav-item war">
        <a class="nav-link" href="./Contact.php">Contact</a>
        </li>

        <li class="nav-item dropdown notification-bttn" style="margin-top: -5px;">
         <div class="dropdown">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 25px; color: white;margin-top: 5px;"></i>
            <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu" id="menu1" style="margin-top: 15px;">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>
        </li>           

        <li class="nav-item dropdown user-logo">
         <div class="dropdown">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
           <img src="../assets/image/admin-user.png">
          </button>
        <div class="dropdown-menu" id="menu" style="margin-top: 15px;">
          <a class="dropdown-item" href="#">My Dashboard</a>
          <a class="dropdown-item" href="./service-provider-setting.php">My Setting</a>
          <a class="dropdown-item logout" href="#">Logout</a>
        </div>
       </div>
       </li>
      
       </ul>
      </div>
     </div>
    </nav>
   </section>


<!-- Mobile Nav -->

<section class="mobile-nav">

<nav class="navbar sticky-top navbar-expand-lg ">
   <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png" class="header-logo"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

         <div class="dropdown notify">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 25px; color: white;margin-top: 5px;"></i>
           <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>

 <div class="offcanvas offcanvas-end" id="demo" style="width:270px;">

  <div class="offcanvas-header">
      <h1 class="offcanvas-title">Welcome,<br><b><?php echo $_SESSION['name']; ?></b></h1>
  </div>

 <div class="hrr"><hr></div>

   <div class="offcanvas-body" style="margin-top: -20px !important;">
   <div class="dash">
   
    <a href="#">Dashboard</a>
    <a href="./NewService.php">New Service Requests</a>
    <a href="./Upcoming.php">Upcoming Services</a>
    <a href="./Service-Scheduling.php">Service Schedule</a>
    <a href="./ServiceProviderHistory.php">Service History</a>
    <a href="./myrating">My Ratings</a>
    <a href="./BlockCustomer.php">Block Customer</a>
    <a href="#">Invoices</a>
    <a href="./service-provider-setting.php">My Settings</a>
    <a href="#" class="logout">Logout</a>

    <div class="hrr"><hr></div>

    <a href="./Prices.php">Prices & services</a>
    <a href="#">Warrant</a>
    <a href="#">Blog</a>
    <a href="./Contact.php">Contact</a>
    <a href="./Service.php">Become a Helper</a>
    <div class="hrr"><hr></div>
    <div class="face">
    <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
    <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
   </div>
  </div>
 </div>
</div>
</nav>
</section>

<?php } ?>