<?php 
    
$base_url = "http://localhost/Helperland/";

if (!isset($_SESSION['username'])) { ?>

<header>

<div class="header-nav">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light">
     <a class="navbar-brand" href="#"><img src="../assets/image/logo-small.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"><i class="fa fa-bars " style="color:white;padding: 5px;"></i></span>
      </button>
    
      <div class="collapse navbar-collapse float-right" id="navbarNavDropdown">
       <ul class="navbar-nav">
        <li class="nav-item nav-menu">
          <a class="nav-link" id="nav1" href="./book-service">Book a Cleaner </a>
          <a class="nav-link" href="./Prices.php">Prices</a>
          <a class="nav-link" href="#">Our Guaruntee</a>
          <a class="nav-link" href="#">Blog</a>
          <a class="nav-link" href="./Contact.php">Contact Us</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link " id="nav2" href="#" data-toggle="modal" data-target="#myModal">Login </a>
        </li>
  
        <li class="nav-item ">
          <a class="nav-link" id="nav3" href="./Service.php">Become a Helper </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../assets/image/ic-flag.png" style="margin-top: -10px;">
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
   <a class="navbar-logo1" href="#"><img src="../assets/image/logo-small.png"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

 <div class="offcanvas offcanvas-end" id="demo" style="width:262px;">
 
   <div class="offcanvas-body">
   <div class="dash">
   
  <a href="./book-service">Book a Cleaner </a>
  <a href="./Prices.php">Prices</a>
  <a href="#">Our Guaruntee</a>
  <a href="#">Blog</a>
  <a href="./Contact.php">Contact Us</a>
  <a href="#" data-toggle="modal" data-target="#myModal">Login</a>
  <a href="./Service-provider">Become a Helper </a>
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


<?php if (isset($_SESSION['username'])) { ?>

<header>

<div class="header-nav">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light">
     <a class="navbar-brand" href="#"><img src="../assets/image/logo-small.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"><i class="fa fa-bars " style="color:white;padding: 5px;"></i></span>
      </button>
    
      <div class="collapse navbar-collapse float-right" id="navbarNavDropdown">
       <ul class="navbar-nav">
        <li class="nav-item nav-menu">
          <a class="nav-link" id="nav1" href="./book-service">Book a Cleaner </a>
          <a class="nav-link" href="./Prices.php">Prices</a>
          <a class="nav-link" href="#">Our Guaruntee</a>
          <a class="nav-link" href="#">Blog</a>
          <a class="nav-link" href="./Contact.php">Contact Us</a>
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

        <li class="nav-item dropdown user-logo">
         <div class="dropdown">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
           <img src="../assets/image/admin-user.png">
          </button>
        <div class="dropdown-menu" id="menu" style="margin-top: 40px;">
          <a class="dropdown-item" href="#">User Profile</a>
          <a class="dropdown-item" href="#">Setting</a>
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
   <a class="navbar-logo1" href="#"><img src="../assets/image/logo-small.png"></a>
     <button class="btn bttn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="fas fa-bars"></i></button>

         <div class="dropdown notify">
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

 <div class="offcanvas offcanvas-end" id="demo" style="width:262px;">
 
   <div class="offcanvas-body">
   <div class="dash">
   
  <a href="./book-service">Book a Cleaner </a>
  <a href="./Prices.php">Prices</a>
  <a href="#">Our Guaruntee</a>
  <a href="#">Blog</a>
  <a href="./Contact.php">Contact Us</a>
  <a href="#" data-toggle="modal" data-target="#myModal">Login</a>
  <a href="./Service-provider">Become a Helper </a>
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