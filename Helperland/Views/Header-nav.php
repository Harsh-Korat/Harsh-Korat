<?php 
    
$base_url = "http://localhost/Helperland/";

if (!isset($_SESSION['username'])) { ?>

<header>

<div class="header-nav">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light">
     <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"><i class="fa fa-bars " style="color:white;padding: 5px;"></i></span>
      </button>
    
      <div class="collapse navbar-collapse float-right" id="navbarNavDropdown">
       <ul class="navbar-nav">
        <li class="nav-item nav-menu">
          <a class="nav-link" id="nav1" href="./book-service.php">Book a Cleaner </a>
          <a class="nav-link" href="./Prices.php">Prices</a>
          <a class="nav-link" href="#">Our Guaruntee</a>
          <a class="nav-link" href="#">Blog</a>
          <a class="nav-link" href="./Contact.php">Contact Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="nav2" href="#" data-toggle="modal" data-target="#myModal">Login</a>
        </li>
  
        <li class="nav-item ">
          <a class="nav-link" id="nav3" href="./Service.php">Become a Helper </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../assets/image/ic-flag.png" style="margin-top: 0px;">
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#" >Dubai</a>
          <a class="dropdown-item" href="#">India</a>
          <a class="dropdown-item" href="#">Rom</a>
          </div>
         </li>
        </ul>
       </div>
      </nav>
  </div>
  </header>


<!-- Mobile Navbar -->

<div class="mobile-nav">
<nav class="navbar navbar-expand-lg fixed-top navbar-light">
   <a class="navbar-logo1" href="./index.php"><img src="../assets/image/logo-small.png"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

 <div class="offcanvas offcanvas-end" id="demo" style="width:262px;">
 
   <div class="offcanvas-body">
   <div class="dash">
   
  <a href="./book-service.php">Book a Cleaner </a>
  <a href="./Prices.php">Prices</a>
  <a href="#">Our Guaruntee</a>
  <a href="#">Blog</a>
  <a href="./Contact.php">Contact Us</a>
  <a href="#" class="login1" data-toggle="modal" data-target="#myModal">Login</a>
  <a href="./Service.php">Become a Helper </a>
  <div class="dropdown" id="drop">
  <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <img src="../assets/image/ic-flag.png">
  </a>
  <div class="dropdown-menu img" aria-labelledby="navbarDropdownMenuLink" style="margin-left: 20px;">
     <a class="dropdown-item" href="#">Dubai</a>
     <a class="dropdown-item" href="#">India</a>
     <a class="dropdown-item" href="#">Rom</a>
     </div>
  </div>
  <div class="hrr"><hr></div>
  <div class="face">
  <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
  <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
 </div>
</div>
</div>
</div>
</nav>
</div>

<?php } ?>


<?php if((isset($_SESSION['username'])) && (isset($_SESSION['usertypeid'])) && ($_SESSION['usertypeid'] == 0)) { ?>

<header>

<div class="header-nav">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light">
     <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"><i class="fa fa-bars " style="color:white;padding: 5px;"></i></span>
      </button>
    
      <div class="collapse navbar-collapse float-right" id="navbarNavDropdown"  style="padding-top: 12px;">
       <ul class="navbar-nav">
        <li class="nav-item nav-menu">
          <a class="nav-link" id="nav1" href="./book-service.php">Book a Cleaner </a>
          <a class="nav-link" href="./Prices.php">Prices</a>
          <a class="nav-link" href="#">Our Guaruntee</a>
          <a class="nav-link" href="#">Blog</a>
          <a class="nav-link" style="margin-right: -18px;" href="./Contact.php">Contact Us</a>
        </li>

        <li class="nav-item dropdown notification-bttn" style="margin-top: -8px;">
         <div class="dropdown">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 25px; color: white;margin-top: 5px;"></i>
            <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu" id="menu1" style="margin-top: 10px;">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>
        </li>           

        <li class="nav-item dropdown user-logo" style="margin-top: -8px;">
         <div class="dropdown">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
           <img src="../assets/image/admin-user.png">
          </button>
        <div class="dropdown-menu" id="menu" style="margin-top: 30px;">
          <a class="dropdown-item" href="./customer-dashboard.php">My Dashboard</a>
          <a class="dropdown-item" href="./customer-setting.php">Setting</a>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
       </div>
       </li>
      
        </ul>
       </div>
      </nav>
  </div>
  </header>


<!-- Mobile Navbar -->

<div class="mobile-nav">
<nav class="navbar navbar-expand-lg fixed-top navbar-light">
   <a class="navbar-logo1" href="./index.php"><img src="../assets/image/logo-small.png"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

         <div class="dropdown notify" style="margin-top: 0px;">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 30px; color: white;margin-top: 5px;"></i>
           <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>

 <div class="offcanvas offcanvas-end" id="demo" style="width:260px;">

  <div class="offcanvas-header">
      <h1 class="offcanvas-title">Welcome,<br><b><?php echo $_SESSION['name']; ?></b></h1>
  </div>

 <div class="hrr5"><hr></div>
 
   <div class="offcanvas-body" style="margin-top: -13px;">
   <div class="dash">
   
   <a href="./customer-dashboard.php">Dashboard</a>
    <a href="./service-history.php">Service History</a>
    <a href="#">Service Schedule</a>
    <a href="#">Favourite Pros</a>
    <a href="#">Invoices</a>
    <a href="./customer-setting.php">My Settings</a>
    <a href="#">Logout</a>

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
</div>

<?php } ?>


<?php if((isset($_SESSION['username'])) && (isset($_SESSION['usertypeid'])) && ($_SESSION['usertypeid'] == 1)) { ?>

<header>

<div class="header-nav">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light">
     <a class="navbar-brand" href="./index.php"><img src="../assets/image/logo-small.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"><i class="fa fa-bars " style="color:white;padding: 5px;"></i></span>
      </button>
    
      <div class="collapse navbar-collapse float-right" id="navbarNavDropdown"  style="padding-top: 12px;">
       <ul class="navbar-nav">
        <li class="nav-item nav-menu">
          <a class="nav-link" href="./Prices.php">Prices</a>
          <a class="nav-link" href="#">Our Guaruntee</a>
          <a class="nav-link" href="#">Blog</a>
          <a class="nav-link" style="margin-right: -18px;" href="./Contact.php">Contact Us</a>
        </li>

        <li class="nav-item dropdown notification-bttn" style="margin-top: -8px;">
         <div class="dropdown">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 25px; color: white;margin-top: 5px;"></i>
            <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu" id="menu1" style="margin-top: 10px;">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>
        </li>           

        <li class="nav-item dropdown user-logo" style="margin-top: -8px;">
         <div class="dropdown">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
           <img src="../assets/image/admin-user.png">
          </button>
        <div class="dropdown-menu" id="menu" style="margin-top: 30px;">
          <a class="dropdown-item" href="#">My Dashboard</a>
          <a class="dropdown-item" href="./service-provider-setting.php">Setting</a>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
       </div>
       </li>
      
        </ul>
       </div>
      </nav>
  </div>
  </header>


<!-- Mobile Navbar -->

<div class="mobile-nav">
<nav class="navbar navbar-expand-lg fixed-top navbar-light">
   <a class="navbar-logo1" href="./index.php"><img src="../assets/image/logo-small.png"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

         <div class="dropdown notify" style="margin-top: 0px;">
          <button type="button" class="btn" data-toggle="dropdown">
           <i class="fas fa-bell" style="font-size: 30px; color: white;margin-top: 5px;"></i>
           <span class="Ellipse-5">2</span>
          </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Notification1</a>
          <a class="dropdown-item" href="#">Notification2</a>
          <a class="dropdown-item" href="#">Notification3</a>
         </div>
        </div>

 <div class="offcanvas offcanvas-end" id="demo" style="width:260px;">

  <div class="offcanvas-header">
      <h1 class="offcanvas-title">Welcome,<br><b><?php echo $_SESSION['name']; ?></b></h1>
  </div>

 <div class="hrr5"><hr></div>
 
   <div class="offcanvas-body" style="margin-top: -13px;">
   <div class="dash">
   
    <a href="#">Dashboard</a>
    <a href="./NewService.php">New Service Requests</a>
    <a href="./Upcoming.php">Upcoming Services</a>
    <a href="#">Service Schedule</a>
    <a href="./ServiceProviderHistory.php">Service History</a>
    <a href="./myrating">My Ratings</a>
    <a href="./BlockCustomer.php">Block Customer</a>
    <a href="#">Invoices</a>
    <a href="./service-provider-setting.php">My Settings</a>
    <a href="#">Logout</a>

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
</div>

<?php } ?>